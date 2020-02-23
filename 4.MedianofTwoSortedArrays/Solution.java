package priv.h.leetcode.no4;

public class Solution {
    public static double findMedianSortedArrays(int[] nums1, int[] nums2) {
        int nums1_length = nums1.length;
        int nums2_length = nums2.length;

        int target1 = (nums1_length + nums2_length + 1) / 2;
        int target2 = (nums1_length + nums2_length + 2) / 2;

        if (target1 == target2) {
            return getKth(nums1, 0, nums1_length - 1, nums2, 0, nums2_length - 1, target1);
        }

        return (getKth(nums1, 0, nums1_length - 1, nums2, 0, nums2_length - 1, target1) +
                getKth(nums1, 0, nums1_length - 1, nums2, 0, nums2_length - 1, target2)) * 0.5;
    }

    public static double getKth(int[] nums1, int start1, int end1, int[] nums2, int start2, int end2, int target) {
        int len1 = end1 - start1 + 1;
        int len2 = end2 - start2 + 1;

        // 确保len1 比len2小,只需要检查len1是否为空就可以了
        if (len1 > len2) {
            return getKth(nums2, start2, end2, nums1, start1, end1, target);
        }

        if (len1 <= 0) {
            return nums2[start2 + target - 1];
        }

        if (target == 1) {
            return Math.min(nums1[start1], nums2[start2]);
        }

        int half_target = target / 2;
        int compare_pos1 = start1 + Math.min(len1, half_target) - 1;
        int compare_pos2 = start2 + Math.min(len2, half_target) - 1;

        if (nums2[compare_pos2] > nums1[compare_pos1]) {
            return getKth(nums1, compare_pos1 + 1, end1, nums2, start2, end2, target - Math.min(half_target, len1));
        }

        return getKth(nums1, start1, end1, nums2, compare_pos2 + 1, end2, target - Math.min(half_target, len2));
    }


    public static void main(String[] args) {
        int[] nums1 = {10,20,30};
        int[] nums2 = {20,40,60};

        double r = findMedianSortedArrays(nums1, nums2);
        System.out.println(r);
    }
}
