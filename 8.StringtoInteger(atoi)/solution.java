public class Solution
{
    public int myAtoi(String str) {
        int len = str.length();

        int i = 0;
        while (i<len && str.charAt(i) == ' ') {
            i++;
        }

        if (i == len) {
            return 0;
        }

        int sign = 1;
        if (str.charAt(i) == '-') {
            sign = -1;
            i++;
        } else if (str.charAt(i) == '+') {
            i++;
        }

        int result = 0;
        for (; i < len; i++) {
            char currentChar = str.charAt(i);
            if (currentChar < '0' || currentChar > '9') {
                break;
            }

            if (result > Integer.MAX_VALUE / 10 ||
                (result == Integer.MAX_VALUE/10 && (currentChar - '0') > Integer.MAX_VALUE % 10))
            {
                return Integer.MAX_VALUE;
            }

            if (result < Integer.MIN_VALUE / 10 ||
                (result == Integer.MIN_VALUE/10 && (currentChar - '0') > -(Integer.MIN_VALUE % 10)))
            {
                return Integer.MIN_VALUE;
            }

            result = result * 10 + sign * (currentChar - '0');
        }

        return result;
    } 
}