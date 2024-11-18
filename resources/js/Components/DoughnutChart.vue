<script setup>
import { Chart as ChartJS, ArcElement, Tooltip, Legend } from 'chart.js'
import { Doughnut } from 'vue-chartjs'

ChartJS.register(ArcElement, Tooltip, Legend)

const data = {
  labels: ['在室数', '空室数'],
  datasets: [
    {
      backgroundColor: ['#1e4290', '#d5d5d5'],
      data: [7, 1]
    }
  ]
}
const options = {
  responsive: true,
  maintainAspectRatio: false
}
</script>
<template>
    <div>
        <Doughnut :data="data" :options="options" />
    </div>
</template>
<style lang="scss" scoped></style>
