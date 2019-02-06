.bg-green {
background-color:  !important
}

.bg-blue {
background-color:  !important
}

.bg-red {
background-color:  !important
}


<script>
    import { HorizontalBar } from 'vue-chartjs'
    export default {
        extends: HorizontalBar,
        props: ['predictionDataset'],
        data() {
            return {
                data: {
                    labels: ["Alive", "Dead", "Wight"],
                    datasets: [{
                        label: '% of predictions',
                        data: this.predictionDataset,
                        backgroundColor: [
                            '#78bf8b',
                            '#c26366',
                            '#66adb9',
                        ],
                        borderColor: [
                            '#78bf8b',
                            '#c26366',
                            '#66adb9',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        xAxes: [{
                            ticks: {
                                min: 0,
                                max: 100,
                                precision: 2,
                            },
                        }]
                    }
                }
            }
        },
        mounted() {
            this.renderChart(this.data, this.options)
        }
    }
</script>
