class Solution {
    public boolean isPalindrome(int x) {
        if (x<0) {
            return false;
        }

        if (x < 10) {
            return true;
        }

        int reverse = 0;
        int left = x;
        while (left > 0) {
            left = left / 10;
            reverse = left % 10 * 10 + reverse;
        }

        if (reverse == x) {
            return true;
        }

        return false;
    }
}