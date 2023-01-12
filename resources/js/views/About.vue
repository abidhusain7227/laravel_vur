<script>
export default {
    mounted() {
        console.log("aboute");
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

        loop(){
          let arry = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95, 96, 97, 98, 99, 100];
          let slice;
          let data = [];
          for (let index = 0; index < arry.length;) {
            const element = arry[index];
            slice = arry.slice(index,4+index);
            data.push(slice);
            index = index + 4;
            
          }
          console.log('abid',data);
          console.log(arry.length)
        },

        addTwoNumbers(){
          let l1 = [9,9,9,9,9,9,9], l2 = [9,9,9,9]
          let rel1 = l1.reverse().toString().split(',').join("");
          let rel2 = l2.reverse().toString().split(',').join("");
          let sum = Number(rel1) + Number(rel2)
          let myFunc = num => Number(num);
          var output = Array.from(String(sum), myFunc);
          output = output.reverse()
          return output;
        },
         isPalindrome(x=10) {
            const isNegative = x< 0 ? true : false;
            if (isNegative){
                return false;
            }
            const temp = x;
            let reversed = 0;
              
            while(x>0){
                reversed = (reversed * 10) + (x%10);
                x = parseInt(x/10);
            }
            return reversed == temp;
          }
    },
};
</script>

<template>
    <div>
        <button @click="isPalindrome()">isPalindrome</button>
        <h1>{{ isPalindrome() }}</h1>
    </div>
</template>
