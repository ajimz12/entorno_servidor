<?php

class OrderRepository
{

    public static function addOrder($order)
    {
        $db = Connect::connection();
        $query = "INSERT INTO order (user_id, order_date, total, status) VALUES ('$order->getUserId', '$order->getOrderDate, '$order->getTotal' , '$order->getStatus";
        $db->query($query);
    }

    public static function getAllOrders()
    {
        $db = Connect::connection();
        $orders = array();
        $result = $db->query("SELECT * FROM orders");
        while ($row = $result->fetch_assoc()) {
            $orders[] = new Order($row);
        }
        return $orders;
    }
}
