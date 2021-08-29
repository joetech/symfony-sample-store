<?php

namespace App\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class User extends AbstractController
{
    const ITEMS_PER_PAGE = 20;

    /**
     * @Route("/user/{page}", name="products_view", defaults={"page" = 1})
     */
    public function viewProducts(int $page): Response
    {
        $end = $page * self::ITEMS_PER_PAGE;
        $start = $end - self::ITEMS_PER_PAGE;

        $user = $this->getUser();
        $name = $user->getName();
        $products = $user->getProducts();
        $itemCount = count($products->toArray());
        $products = $products->slice($start, self::ITEMS_PER_PAGE);

        return $this->render(
            'user/view-products.html.twig',
            [
                'user_name' => $name,
                'products' => $products,
                'page' => $page,
                'totalProducts' => $itemCount
            ]
        );
    }

    /**
     * @Route("/user-inventory/{page}/{filterBy}/{filter}", name="inventory_view", defaults={"page" = 1, "filterBy" = null, "filter" = null})
     */
    public function viewInventory(
        int $page,
        string $filterBy = null,
        string $filter = null
    ): Response
    {
        $end = $page * self::ITEMS_PER_PAGE;
        $start = $end - self::ITEMS_PER_PAGE;

        $user = $this->getUser();
        $name = $user->getName();
        $productRepository = $this->getDoctrine()->getManager()->getRepository('App\Entity\Product');
        $inventoryRepository = $this->getDoctrine()->getManager()->getRepository('App\Entity\Inventory');

        switch ($filterBy) {
            case 'productId':
                $filter = (int) $filter;
                $inventory = new ArrayCollection($inventoryRepository->findAllByProductId($filter));
                break;
            case 'sku':
                $inventory = new ArrayCollection($inventoryRepository->findAllBySku($filter));
                break;
            default:
                $inventory = $user->getInventory();
        }

        $itemCount = count($inventory->toArray());
        $inventory = $inventory->slice($start, self::ITEMS_PER_PAGE);

        $productsAndInventory = [];

        foreach ($inventory as $item) {
            $productsAndInventory[] = [
                'product' => $productRepository->findOneById($item->getProductId()),
                'inventory' => $item                
            ];
        }

        return $this->render(
            'user/view-inventory.html.twig',
            [
                'user_name' => $name,
                'inventory' => $productsAndInventory,
                'page' => $page,
                'totalInventory' => $itemCount
            ]
        );
    }
}
