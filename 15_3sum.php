<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function threeSum($nums) {
        sort($nums);  // Sort the array to make two-pointer technique work
        $result = [];
        $loopContinue = count($nums) - 2;  // We stop 2 elements before the last to allow two-pointer

        for ($i = 0; $i < $loopContinue; $i++) {
            // Skip duplicates for the first element
            if ($i > 0 && $nums[$i] == $nums[$i - 1]) {
                continue;
            }

            $left = $i + 1;
            $right = count($nums) - 1;

            while ($left < $right) {
                $sum = $nums[$i] + $nums[$left] + $nums[$right];

                // If sum is less than 0, move left pointer to the right
                if ($sum < 0) {
                    $left++;
                }
                // If sum is greater than 0, move right pointer to the left
                elseif ($sum > 0) {
                    $right--;
                }
                // If sum equals 0, we found a valid triplet
                else {
                    $result[] = [$nums[$i], $nums[$left], $nums[$right]];

                    // Skip duplicate values for the left pointer
                    while ($left < $right && $nums[$left] == $nums[$left + 1]) {
                        $left++;
                    }
                    // Skip duplicate values for the right pointer
                    while ($left < $right && $nums[$right] == $nums[$right - 1]) {
                        $right--;
                    }

                    // Move both pointers inward to continue searching for new pairs
                    $left++;
                    $right--;
                }
            }
        }
        return $result;  // Return the result as the output
    }
}

// Test the code
$solution = new Solution();
$nums = [-1, 0, 1, 2, -1, -4];
$result = $solution->threeSum($nums);
echo "Result:\n";
print_r($result);
?>
