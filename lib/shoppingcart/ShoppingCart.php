<?php
/**
 * Generated by Haxe 4.1.1
 */

namespace shoppingcart;

use \maglev\MagLevNumber;
use \maglev\MagLevString;
use \php\_Boot\HxAnon;
use \maglev\MagLevFunction;
use \maglev\MagLevNull;
use \php\Boot;
use \maglev\MagLevResult;
use \maglev\MagLev;
use \maglev\MagLevArray;
use \maglev\MagLevObject;

/**
 * Shopping Cart
 */
class ShoppingCart {

	/**
	 * @var ShoppingCartLogic
	 */
	public $logic;
	/**
	 * @var MagLev
	 */
	public $maglev;

	/**
	 * @param MagLev $maglev
	 * 
	 * @return void
	 */
	public function __construct ($maglev) {
		#/src/shoppingcart/ShoppingCart.hx:16: characters 3-23
		$this->maglev = $maglev;
		#/src/shoppingcart/ShoppingCart.hx:18: characters 13-39
		$tmp = new CartRepository($maglev);
		#/src/shoppingcart/ShoppingCart.hx:17: lines 17-20
		$this->logic = new ShoppingCartLogic($tmp, new ItemRepository($maglev));
		#/src/shoppingcart/ShoppingCart.hx:21: characters 3-22
		$this->registerMyMethods();
	}

	/**
	 * @return void
	 */
	public function registerMyMethods () {
		#/src/shoppingcart/ShoppingCart.hx:23: lines 23-106
		$_gthis = $this;
		#/src/shoppingcart/ShoppingCart.hx:24: lines 24-31
		$this->maglev->register("ShoppingCart.Create", MagLevFunction::fromFunction(function ($args) use (&$_gthis) {
			#/src/shoppingcart/ShoppingCart.hx:25: characters 13-78
			$storeId = (Boot::typedCast(Boot::getClass(MagLevString::class), $args->get(0)))->getString();
			#/src/shoppingcart/ShoppingCart.hx:26: characters 13-66
			$result = MagLevResult::createAsync();
			#/src/shoppingcart/ShoppingCart.hx:27: lines 27-29
			$_gthis->logic->Create($storeId, function ($cartId) use (&$result) {
				#/src/shoppingcart/ShoppingCart.hx:28: characters 17-66
				$result->setResult(MagLevString::fromString($cartId));
			});
			#/src/shoppingcart/ShoppingCart.hx:30: characters 13-26
			return $result;
		}));
		#/src/shoppingcart/ShoppingCart.hx:32: lines 32-42
		$this->maglev->register("ShoppingCart.AddItem", MagLevFunction::fromFunction(function ($args) use (&$_gthis) {
			#/src/shoppingcart/ShoppingCart.hx:33: characters 13-77
			$cartId = (Boot::typedCast(Boot::getClass(MagLevString::class), $args->get(0)))->getString();
			#/src/shoppingcart/ShoppingCart.hx:34: characters 13-77
			$itemId = (Boot::typedCast(Boot::getClass(MagLevString::class), $args->get(1)))->getString();
			#/src/shoppingcart/ShoppingCart.hx:35: characters 13-68
			$qty = (Boot::typedCast(Boot::getClass(MagLevNumber::class), $args->get(2)))->getInt();
			#/src/shoppingcart/ShoppingCart.hx:36: characters 13-74
			$price = (Boot::typedCast(Boot::getClass(MagLevNumber::class), $args->get(3)))->getFloat();
			#/src/shoppingcart/ShoppingCart.hx:37: characters 13-66
			$result = MagLevResult::createAsync();
			#/src/shoppingcart/ShoppingCart.hx:38: lines 38-40
			$_gthis->logic->AddItem($cartId, $itemId, $qty, $price, function ($idx) use (&$result) {
				#/src/shoppingcart/ShoppingCart.hx:39: characters 17-60
				$result->setResult(MagLevNumber::fromInt($idx));
			});
			#/src/shoppingcart/ShoppingCart.hx:41: characters 13-26
			return $result;
		}));
		#/src/shoppingcart/ShoppingCart.hx:43: lines 43-59
		$this->maglev->register("ShoppingCart.ListItems", MagLevFunction::fromFunction(function ($args) use (&$_gthis) {
			#/src/shoppingcart/ShoppingCart.hx:44: characters 13-77
			$cartId = (Boot::typedCast(Boot::getClass(MagLevString::class), $args->get(0)))->getString();
			#/src/shoppingcart/ShoppingCart.hx:45: characters 13-66
			$result = MagLevResult::createAsync();
			#/src/shoppingcart/ShoppingCart.hx:46: lines 46-57
			$_gthis->logic->ListItems($cartId, function ($items) use (&$result) {
				#/src/shoppingcart/ShoppingCart.hx:47: characters 17-48
				$arr = MagLevArray::create();
				#/src/shoppingcart/ShoppingCart.hx:48: lines 48-55
				$_g = 0;
				while ($_g < $items->length) {
					#/src/shoppingcart/ShoppingCart.hx:48: characters 22-26
					$item = ($items->arr[$_g] ?? null);
					#/src/shoppingcart/ShoppingCart.hx:48: lines 48-55
					++$_g;
					#/src/shoppingcart/ShoppingCart.hx:49: characters 21-53
					$obj = MagLevObject::create();
					#/src/shoppingcart/ShoppingCart.hx:50: characters 21-67
					$obj->set("idx", MagLevNumber::fromInt($item->idx));
					#/src/shoppingcart/ShoppingCart.hx:51: characters 21-76
					$obj->set("itemId", MagLevString::fromString($item->itemId));
					#/src/shoppingcart/ShoppingCart.hx:52: characters 21-69
					$obj->set("qty", MagLevNumber::fromFloat($item->qty));
					#/src/shoppingcart/ShoppingCart.hx:53: characters 21-73
					$obj->set("price", MagLevNumber::fromFloat($item->price));
					#/src/shoppingcart/ShoppingCart.hx:54: characters 21-34
					$arr->push($obj);
				}
				#/src/shoppingcart/ShoppingCart.hx:56: characters 17-38
				$result->setResult($arr);
			});
			#/src/shoppingcart/ShoppingCart.hx:58: characters 13-26
			return $result;
		}));
		#/src/shoppingcart/ShoppingCart.hx:60: lines 60-68
		$this->maglev->register("ShoppingCart.RemoveItem", MagLevFunction::fromFunction(function ($args) use (&$_gthis) {
			#/src/shoppingcart/ShoppingCart.hx:61: characters 13-77
			$cartId = (Boot::typedCast(Boot::getClass(MagLevString::class), $args->get(0)))->getString();
			#/src/shoppingcart/ShoppingCart.hx:62: characters 13-68
			$idx = (Boot::typedCast(Boot::getClass(MagLevNumber::class), $args->get(1)))->getInt();
			#/src/shoppingcart/ShoppingCart.hx:63: characters 13-66
			$result = MagLevResult::createAsync();
			#/src/shoppingcart/ShoppingCart.hx:64: lines 64-66
			$_gthis->logic->RemoveItem($cartId, $idx, function () use (&$result) {
				#/src/shoppingcart/ShoppingCart.hx:65: characters 17-54
				$result->setResult(MagLevNull::create());
			});
			#/src/shoppingcart/ShoppingCart.hx:67: characters 13-26
			return $result;
		}));
		#/src/shoppingcart/ShoppingCart.hx:69: lines 69-78
		$this->maglev->register("ShoppingCart.UpdateQty", MagLevFunction::fromFunction(function ($args) use (&$_gthis) {
			#/src/shoppingcart/ShoppingCart.hx:70: characters 13-77
			$cartId = (Boot::typedCast(Boot::getClass(MagLevString::class), $args->get(0)))->getString();
			#/src/shoppingcart/ShoppingCart.hx:71: characters 13-68
			$idx = (Boot::typedCast(Boot::getClass(MagLevNumber::class), $args->get(1)))->getInt();
			#/src/shoppingcart/ShoppingCart.hx:72: characters 13-68
			$qty = (Boot::typedCast(Boot::getClass(MagLevNumber::class), $args->get(2)))->getInt();
			#/src/shoppingcart/ShoppingCart.hx:73: characters 13-66
			$result = MagLevResult::createAsync();
			#/src/shoppingcart/ShoppingCart.hx:74: lines 74-76
			$_gthis->logic->UpdateQty($cartId, $idx, $qty, function () use (&$result) {
				#/src/shoppingcart/ShoppingCart.hx:75: characters 17-54
				$result->setResult(MagLevNull::create());
			});
			#/src/shoppingcart/ShoppingCart.hx:77: characters 13-26
			return $result;
		}));
		#/src/shoppingcart/ShoppingCart.hx:79: lines 79-86
		$this->maglev->register("ShoppingCart.CountItems", MagLevFunction::fromFunction(function ($args) use (&$_gthis) {
			#/src/shoppingcart/ShoppingCart.hx:80: characters 13-77
			$cartId = (Boot::typedCast(Boot::getClass(MagLevString::class), $args->get(0)))->getString();
			#/src/shoppingcart/ShoppingCart.hx:81: characters 13-66
			$result = MagLevResult::createAsync();
			#/src/shoppingcart/ShoppingCart.hx:82: lines 82-84
			$_gthis->logic->CountItems($cartId, function ($count) use (&$result) {
				#/src/shoppingcart/ShoppingCart.hx:83: characters 17-54
				$result->setResult(MagLevNull::create());
			});
			#/src/shoppingcart/ShoppingCart.hx:85: characters 13-26
			return $result;
		}));
		#/src/shoppingcart/ShoppingCart.hx:87: lines 87-97
		$this->maglev->register("ShoppingCart.GetCartSummary", MagLevFunction::fromFunction(function ($args) use (&$_gthis) {
			#/src/shoppingcart/ShoppingCart.hx:88: characters 13-77
			$cartId = (Boot::typedCast(Boot::getClass(MagLevString::class), $args->get(0)))->getString();
			#/src/shoppingcart/ShoppingCart.hx:89: characters 13-66
			$result = MagLevResult::createAsync();
			#/src/shoppingcart/ShoppingCart.hx:90: lines 90-95
			$_gthis->logic->GetCartSummary($cartId, function ($summary) use (&$result) {
				#/src/shoppingcart/ShoppingCart.hx:91: characters 17-49
				$obj = MagLevObject::create();
				#/src/shoppingcart/ShoppingCart.hx:92: characters 17-70
				$obj->set("items", MagLevNumber::fromInt($summary->items));
				#/src/shoppingcart/ShoppingCart.hx:93: characters 17-72
				$obj->set("total", MagLevNumber::fromFloat($summary->total));
				#/src/shoppingcart/ShoppingCart.hx:94: characters 17-38
				$result->setResult($obj);
			});
			#/src/shoppingcart/ShoppingCart.hx:96: characters 13-26
			return $result;
		}));
		#/src/shoppingcart/ShoppingCart.hx:98: lines 98-105
		$this->maglev->register("ShoppingCart.Clear", MagLevFunction::fromFunction(function ($args) use (&$_gthis) {
			#/src/shoppingcart/ShoppingCart.hx:99: characters 13-66
			$result = MagLevResult::createAsync();
			#/src/shoppingcart/ShoppingCart.hx:100: characters 13-77
			$cartId = (Boot::typedCast(Boot::getClass(MagLevString::class), $args->get(0)))->getString();
			#/src/shoppingcart/ShoppingCart.hx:101: lines 101-103
			$_gthis->logic->Clear($cartId, function () use (&$result) {
				#/src/shoppingcart/ShoppingCart.hx:102: characters 17-54
				$result->setResult(MagLevNull::create());
			});
			#/src/shoppingcart/ShoppingCart.hx:104: characters 13-26
			return $result;
		}));
	}

	/**
	 * @internal
	 * @access private
	 */
	static public function __hx__init ()
	{
		static $called = false;
		if ($called) return;
		$called = true;


	}
}

Boot::registerClass(ShoppingCart::class, 'shoppingcart.ShoppingCart');
Boot::registerMeta(ShoppingCart::class, new HxAnon(["obj" => new HxAnon(["SuppressWarnings" => \Array_hx::wrap([\Array_hx::wrap([
	"checkstyle:FieldDocComment",
	"checkstyle:LocalVariableName",
	"checkstyle:MultipleStringLiterals",
	"checkstyle:MagicNumber",
])])])]));
ShoppingCart::__hx__init();
