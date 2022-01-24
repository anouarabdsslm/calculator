<template>
    <h1>{{ Calculate }}</h1>

    <span  style="color: red;" v-if="error">{{error}}</span>
    <input type="text" v-model="firstValue"/>
    <select name="operator" v-model="selectedOperator">
        <option  
            v-for="(operator, index) in operators" 
            :key="index"
            :value="operator.name"
            v-text="operator.symbol" 
            @change="onChange"
        />
    </select>
    <input type="text"  v-model="secondValue"/>
    <button @click="calculate">Calc</button>
    <br>
    <div class="result">
        <span  style="font-size: 20px;" v-if="result !== null"> Result: {{ result}}</span>
    </div>
</template>
<script>
import { ref } from 'vue'
export default {
    setup() {
        const firstValue = ref(null)
        const secondValue = ref(null)
        const selectedOperator = ref('plus')
        const result = ref(null)
        const error = ref(null)

        const operators = ref([
            {symbol: '+', name: 'plus'},
            {symbol: '-', name: 'minus'},
            {symbol: '*', name: 'multiplication'},
            {symbol: '/', name: 'division'},
        ])

        const calculate = ()=> {

            if(!firstValue.value || !secondValue.value) {
                alert('Make sure to enter the values')
                return
            }
            result.value = null

            axios.post('/calc', {
                first_value: firstValue.value,
                second_value: secondValue.value,
                operator: selectedOperator.value
            })
            .then(response => result.value = response.data.result)
            .catch(err => {
                error.value = err.response.data.message
            })
        }

        const onChange = () =>result.value = null

        return {
            firstValue,
            secondValue,
            operators,
            selectedOperator,
            calculate,
            result,
            error,
            onChange
        }

    }
}
</script>

<style scoped>
 input {
     border: 1px solid black;
 }
 .result {

 }
</style>