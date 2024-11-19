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
    labels: ['', ''],
    datasets: [
        {
            label: '収入',
            data: [747, 0],
            backgroundColor: '#1e4290',
            stack: 'Stack 0',
            setPercentage: 0.7,
        },
        {
            label: '支出',
            data: [0, 230],
            backgroundColor: '#d5d5d5',
            stack: 'Stack 1',
            setPercentage: 0.7,
        },
        {
            label: '利益',
            data: [0, 517],
            backgroundColor: '#a38e5a',
            stack: 'Stack 1',
            setPercentage: 10,
        },
    ],
};
const options = {
    responsive: true,
    scales: {
        y: {
            beginAtZero: true,
            ticks: {
                font: {
                    size: 18,
                },
                maxTicksLimit: 5,
                callback: function (label, index) {
                    if (index == 4) {
                        return [
                            '（千円）',
                            label
                                .toString()
                                .replace(/\B(?=(\d{3})+(?!\d))/g, ','),
                        ];
                    } else {
                        return label
                            .toString()
                            .replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                    }
                },
            },
        },
    },
    tooltips: {
        enabled: true,
    },
    plugins: {
      legend: {
        display: true,
        position: "top",
        labels: {
          boxWidth: 20,
          font: {
            size: 18,
          }
        }
      }
    },
    animation: {
        animateScale: true,
        animateRotate: true,
    },
    cutoutPercentage: 80,
};
</script>
<template>
    <div class="mt-10">
        <Bar :data="data" :options="options" width="540" height="405" />
        <p class="text-[12px]">※グラフの金額は千円未満を四捨五入しています。</p>
    </div>
</template>
