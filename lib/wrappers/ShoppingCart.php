<?php
namespace mindpowered\shoppingcart;

use \maglev\MagLev;
use \maglev\MagLevPhp;
use \shoppingcart\ShoppingCart as ShoppingCart_Library;

/**
 * Copyright Mind Powered Corporation 2020
 * 
 * https://mindpowered.dev/
 */


/**
 * An Shopping Cart Library
 * Add items and show a summary at checkout
 */
class ShoppingCart
{
	/**
	 * ShoppingCart
	 */
	function __construct() {
		$bus = MagLev::getInstance('default');
		$lib = new ShoppingCart_Library($bus);
	}

	/**
	 * Create a new shopping cart
	 * @param string $storeId 
	 * @return string cartId
	 */
	public function Create($storeId)
	{
		$phpbus = MagLevPhp::getInstance('default');
		$args = [$storeId];
		$ret = null;
		$phpbus->call('ShoppingCart.Create', $args, function($async_ret) use (&$ret) { $ret = $async_ret; });
		return $ret;
	}

	/**
	 * Add an item to a cart
	 * @param string $cartId 
	 * @param string $itemId 
	 * @param float $qty quantity
	 * @param float $price price
	 * @return float cart item index
	 */
	public function AddItem($cartId, $itemId, $qty, $price)
	{
		$phpbus = MagLevPhp::getInstance('default');
		$args = [$cartId, $itemId, $qty, $price];
		$ret = null;
		$phpbus->call('ShoppingCart.AddItem', $args, function($async_ret) use (&$ret) { $ret = $async_ret; });
		return $ret;
	}

	/**
	 * Get a list of items in a cart
	 * @param string $cartId 
	 * @return array array of item objects
	 */
	public function ListItems($cartId)
	{
		$phpbus = MagLevPhp::getInstance('default');
		$args = [$cartId];
		$ret = null;
		$phpbus->call('ShoppingCart.ListItems', $args, function($async_ret) use (&$ret) { $ret = $async_ret; });
		return $ret;
	}

	/**
	 * Remove an item from a cart
	 * @param string $cartId 
	 * @param float $idx item index
	 * @return void
	 */
	public function RemoveItem($cartId, $idx)
	{
		$phpbus = MagLevPhp::getInstance('default');
		$args = [$cartId, $idx];
		$phpbus->call('ShoppingCart.RemoveItem', $args, function($async_ret){});
	}

	/**
	 * Update cart item quantity
	 * @param string $cartId 
	 * @param float $idx item index
	 * @param float $qty quantity
	 * @return void
	 */
	public function UpdateQty($cartId, $idx, $qty)
	{
		$phpbus = MagLevPhp::getInstance('default');
		$args = [$cartId, $idx, $qty];
		$phpbus->call('ShoppingCart.UpdateQty', $args, function($async_ret){});
	}

	/**
	 * Count the items in a cart
	 * @param string $cartId 
	 * @return float number of items
	 */
	public function CountItems($cartId)
	{
		$phpbus = MagLevPhp::getInstance('default');
		$args = [$cartId];
		$ret = null;
		$phpbus->call('ShoppingCart.CountItems', $args, function($async_ret) use (&$ret) { $ret = $async_ret; });
		return $ret;
	}

	/**
	 * Get a summary for a shopping cart
	 * @param string $cartId 
	 * @return object summary
	 */
	public function GetCartSummary($cartId)
	{
		$phpbus = MagLevPhp::getInstance('default');
		$args = [$cartId];
		$ret = null;
		$phpbus->call('ShoppingCart.GetCartSummary', $args, function($async_ret) use (&$ret) { $ret = $async_ret; });
		return $ret;
	}

	/**
	 * Clear all items from a shopping cart
	 * @param string $cartId 
	 * @return void
	 */
	public function Clear($cartId)
	{
		$phpbus = MagLevPhp::getInstance('default');
		$args = [$cartId];
		$phpbus->call('ShoppingCart.Clear', $args, function($async_ret){});
	}

}
