<?php
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
class Solution {

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2, int $add = 0) {
        if (!$l1 & !$l2) {
            if ($add > 0) {
                return new ListNode($add);
            }
            return null;
        }

        if ($l1 && $l2) {
            $sum = $l1->val + $l2->val + $add;
            if ($sum < 10) {
                $add = 0;
            }  else {
                $sum = $sum - 10;
                $add = 1;
            }
            $l = new ListNode($sum);
            $l->next = $this->addTwoNumbers($l1->next, $l2->next, $add);
            return $l;
        }

        $l1 = $l1 ? $l1: $l2;
        if ($add > 0) {
            $l2 = new ListNode($add);
            return $this->addTwoNumbers($l1, $l2);
        } else {
            return $l1;
        }
    }
}