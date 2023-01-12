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
    },
};
</script>

<template>
    <div>
        <button @click="TwoSum()">TwoSum</button>
        <h1>{{ TwoSum() }}</h1>
    </div>
</template>
