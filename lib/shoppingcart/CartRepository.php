<?php
/**
 * Generated by Haxe 4.1.1
 */

namespace shoppingcart;

use \php\Boot;
use \maglev\MagLev;

class CartRepository {
	/**
	 * @var MagLev
	 */
	public $bus;
	/**
	 * @var \Array_hx
	 */
	public $carts;
	/**
	 * @var int
	 */
	public $counter;

	/**
	 * @param MagLev $bus
	 * 
	 * @return void
	 */
	public function __construct ($bus) {
		#/src/shoppingcart/CartRepository.hx:12: characters 9-23
		$this->bus = $bus;
		#/src/shoppingcart/CartRepository.hx:13: characters 9-44
		$this->carts = new \Array_hx();
		#/src/shoppingcart/CartRepository.hx:14: characters 9-25
		$this->counter = 0;
	}

	/**
	 * @param CartModel $cart
	 * @param \Closure $callback
	 * 
	 * @return void
	 */
	public function Add ($cart, $callback) {
		#/src/shoppingcart/CartRepository.hx:30: characters 9-54
		$cartId = \Std::string($this->counter);
		#/src/shoppingcart/CartRepository.hx:31: characters 9-26
		$this->counter += 1;
		#/src/shoppingcart/CartRepository.hx:32: characters 9-25
		$cart->id = $cartId;
		#/src/shoppingcart/CartRepository.hx:33: characters 9-30
		$_this = $this->carts;
		$_this->arr[$_this->length++] = $cart;
		#/src/shoppingcart/CartRepository.hx:34: characters 9-25
		$callback($cartId);
	}

	/**
	 * @param string $cartId
	 * @param \Closure $callback
	 * 
	 * @return void
	 */
	public function Remove ($cartId, $callback) {
		#/src/shoppingcart/CartRepository.hx:38: lines 38-44
		$_g = 0;
		$_g1 = $this->carts;
		while ($_g < $_g1->length) {
			#/src/shoppingcart/CartRepository.hx:38: characters 14-18
			$cart = ($_g1->arr[$_g] ?? null);
			#/src/shoppingcart/CartRepository.hx:38: lines 38-44
			++$_g;
			#/src/shoppingcart/CartRepository.hx:39: lines 39-43
			if ($cart->id === $cartId) {
				#/src/shoppingcart/CartRepository.hx:40: characters 17-40
				$this->carts->remove($cart);
				#/src/shoppingcart/CartRepository.hx:41: characters 17-27
				$callback();
				#/src/shoppingcart/CartRepository.hx:42: characters 17-23
				return;
			}
		}
		#/src/shoppingcart/CartRepository.hx:45: characters 9-19
		$callback();
	}
}

Boot::registerClass(CartRepository::class, 'shoppingcart.CartRepository');