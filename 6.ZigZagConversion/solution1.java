class Solution
{
    public String convert(String s, int numRows)
    {
        if (numRows == 1) {
            return s;
        }

        int step = 2 * numRows - 2;
        StringBuilder ret = new StringBuilder();

        for (int i = 0; i < numRows; i++) {
            for (int j = 0; j + i < s.length(); j += step) {
                ret.append(s.charAt(j+i));
                if (i != 0 && i != numRows - 1 && j + step - i < s.length()) {
                    ret.append(s.charAt(j+step-i));
                }
            }
        }

        return ret.toString();
    }
}