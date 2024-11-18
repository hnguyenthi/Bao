<script setup>
import {
    Chart as ChartJS,
    Title,
    Tooltip,
    Legend,
    BarElement,
    CategoryScale,
    LinearScale,
} from 'chart.js';
import { Bar } from 'vue-chartjs';

ChartJS.register(
    CategoryScale,
    LinearScale,
    BarElement,
    Title,
    Tooltip,
    Legend,
);
const data = {
    labels: [''],
    datasets: [
        {
            label: '収入',
            data: [747],
            backgroundColor: '#1e4290',
            stack: 'Stack 0',
            setPercentage: 0.7,
        },
        {
            label: '支出',
            data: [230],
            backgroundColor: '#d5d5d5',
            stack: 'Stack 1',
            setPercentage: 0.7,
        },
        {
            label: '利益',
            data: [517],
            backgroundColor: '#a38e5a',
            stack: 'Stack 1',
            setPercentage: 10,
        },
    ],
};
const options = {
    scales: {
        xAxes: [
            {
                stacked: true,
                id: 'xAxis1',
                type: 'category',
                ticks: {
                    callback: function (label) {
                        var month = label.split(';')[0];
                        var year = label.split(';')[1];
                        return month;
                    },
                },
                barThickness: 10, // number (pixels) or 'flex'
                maxBarThickness: 1,
            },
        ],
        yAxes: [
            {
                maxBarThickness: 1,
                ticks: {
                    callback: function (label) {
                        return '円';
                    },
                },
            },
        ],
    },
};
</script>
<template>
    <div class="h-[405px] w-[540px] p-[50px]">
        <Bar :data="data" :options="options" width="540" height="405" />
    </div>
</template>
