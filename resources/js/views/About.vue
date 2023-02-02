<script>
export default {
    mounted() {
    },
    data() {
        return {};
    },
    methods: {
        TwoSum() {
            let nums = [-1, -2, -3, -4, -5];
            let target = -8;
            let data;
            for (let index = 0; index < nums.length; index++) {
                const element = nums[index];
                if (element < target) {
                    data = target - element;
                } else if (element > target) {
                    data = target - element;
                } else {
                    data = element - target;
                }
                let i = 1;
                for (let index2 = 0; index2 < nums.length; index2++) {
                    const element2 = nums[index2];
                    let data2 = element + element2;
                    if (element2 == data) {
                        if (index != index2) {
                            if (data2 == target) {
                                let Output = [index, index2];
                                return Output;
                            }
                        }
                    } else {
                        i++;
                    }
                }
            }
        },
        loop() {
            let arry = [
                1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18,
                19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34,
                35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50,
                51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66,
                67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82,
                83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95, 96, 97, 98,
                99, 100,
            ];
            let slice;
            let data = [];
            for (let index = 0; index < arry.length; ) {
                const element = arry[index];
                slice = arry.slice(index, 4 + index);
                data.push(slice);
                index = index + 4;
            }
        },
        // addTwoNumbers(){
        //   let l1 = [2,4,3], l2 = [5,6,4]
        //   let rel1 = l1.reverse().toString().split(',').join("");
        //   let rel2 = l2.reverse().toString().split(',').join("");
        //   let sum = Number(rel1) + Number(rel2)
        //   let myFunc = num => Number(num);
        //   var output = Array.from(String(sum), myFunc);
        //   output = output.reverse()
        //   return output;
        // },

        addTwoNumbers() {
            // Input: l1 = [2,4,3], l2 = [5,6,4]
            // Output: [7,0,8]
            // Explanation: 342 + 465 = 807.
            let l1 = [2, 4, 3],
                l2 = [5, 6, 4];
            var alpha1 = "";
            var alpha2 = "";
            var arr = [];

            for (var i = 0; i < l1.length; i++) {
                alpha1 = l1[i] + alpha1;
            }

            for (var i = 0; i < l2.length; i++) {
                alpha2 = l2[i] + alpha2;
            }

            var New = parseInt(alpha1) + parseInt(alpha2);
            New = New + "";

            for (var i = 0; i < New.length; i++) {
                arr.push(parseInt(New[New.length - i - 1]));
            }
            return arr;
        },
        isPalindrome(x = 100000000001) {
            const isNe = x < 0 ? true : false;
            if (isNe) {
                return false;
            }
            const temp = x;
            let reversed = 0;

            while (x > 0) {
                reversed = reversed * 10 + (x % 10);
                x = parseInt(x / 10);
            }
            return reversed == temp;
        },
        lengthOfLongestSubstring() {
            // let s = "bbtablud";
            // let s = "anviaj"
            // let s = "loddktdji"
            // let s = "ggububgvfk"
            // let s = "abcabcbb"
            // let s = "aabaab!bb"
            // let s = "dvdf"

            // let s ='asljlj'
             let s = "ianikjekfbfrllbau"
            s = s.toString(s);
            var arr = [];
            var substring = [];
            var forindex;
            var asoarry = {};

            if (s.length > 1) {
                for (var i = 0; i < s.length; i++) {
                    if (arr.includes(s[i])) {
                        var slength = s.length - i;
                        if (substring.length <= arr.length) {
                            substring = arr;
                            arr.forEach((item, index) => {
                                if (item == s[i]) {
                                    forindex = asoarry[s[i]];
                                    arr = [];
                                    asoarry = [];
                                }
                            });
                            i = forindex;
                        } else if (
                            substring.length <= arr.length == false &&
                            substring.length < slength == true
                        ) {
                            if (substring.length <= arr.length) {
                                substring = arr;
                            } else {
                                arr.forEach((item, index) => {
                                    if (item == s[i]) {
                                        forindex = asoarry[s[i]];
                                        arr = [];
                                        asoarry = [];
                                    }
                                });
                                i = forindex;
                            }
                        } else {
                            arr = [];
                            arr.push(s[i]);
                            asoarry = [];
                            asoarry[s[i]] = i;
                        }
                    } else {
                        arr.push(s[i]);
                        asoarry[s[i]] = i;
                    }
                }
            } else if (s.length == 1) {
                substring.push(s.length);
            }
            if (substring.length < arr.length) {
                return arr.length;
            } else {
                return substring.length;
            }
        },
        reverse(){
            let x = 1534
            let l1String = x.toString().replace('-','')
            var alpha1 ='';
            let output 
            if(x < 2 ** 31 - 1 && x > Number(-2) ** Number(31)){
                for (var i = 0; i < l1String.length; i++) {
                    alpha1 = l1String[i] + alpha1;
                }
                if(x < 0){
                    alpha1 = "-"+alpha1
                    
                }
            }else{
                output = 0;
            }
            output = Number(alpha1)
            if(output > 2 ** 31 - 1 ){
                output = 0;
            }
            if(output < Number(-2) ** Number(31)){
                output = 0;
            }
            return output
        },
        
        maxArea() {
            let height = [1,8,6,2,5,4,8,3,7]
            let Area = 0
            let Sbarea = 0
            let maxArea = 0
            for (let i = 0; i < height.length; i++) {
                const element = height[i];
                height.forEach((item, index) => {
                    if(element >= item){
                        Area = item * Math.abs(i-index)
                    }else{
                        Area = element * Math.abs(i-index)
                    }
                    if(Area > Sbarea){
                        Sbarea = Area
                    }
                })
                if(Sbarea > maxArea){
                    maxArea = Sbarea
                }
            }
            return maxArea
            // console.log('maxArea',maxArea)
        },
        longestCommonPrefix () {
            let input= [""];
            let arraysize = input.length;
            console.log(arraysize)
            if (arraysize == 0) {
                return "";
            }
            if (arraysize == 1) {
            console.log('if',arraysize)
                return input[0];
            }

            input.sort();
            let end = Math.min(input[0].length, input[arraysize-1].length);
            let i = 0;
            while (i < end && input[0][i] == input[arraysize-1][i] ){
                i++;
            }
            let output = input[0].substring(0, i);
            return output;
        }
    },
};
</script>

<template>
    <div>
        <button @click="longestCommonPrefix()">
            longestCommonPrefix
        </button>
        <h1>{{ longestCommonPrefix() }}</h1>
    </div>
</template>
