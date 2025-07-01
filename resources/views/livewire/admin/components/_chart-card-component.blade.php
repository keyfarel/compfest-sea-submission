<div class="lg:col-span-2 overflow-hidden rounded-xl bg-white p-6 shadow-lg ring-1 ring-black ring-opacity-5"
     wire:ignore.self
     x-data="chartComponent()"
     x-init="initChart()"
     @chart-updated.window="handleChartUpdate($event)">

    <h3 class="text-lg font-semibold text-gray-900">Grafik Langganan Baru</h3>
    <div class="mt-6 h-72">
        <canvas id="newSubscriptionsChart"></canvas>
    </div>
</div>


<script id="chart-initial-data" type="application/json">
    @json($this->getChartData())
</script>

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('chartComponent', () => ({
                chart: null,
                initialData: null,
                isUpdating: false,
                updateTimeout: null,
                chartInstance: null,

                initChart() {
                    try {
                        const dataScript = document.getElementById('chart-initial-data');
                        if (dataScript) {
                            this.initialData = JSON.parse(dataScript.textContent);
                        } else {
                            return;
                        }
                        this.createChart();
                    } catch (error) {
                    }
                },

                createChart() {
                    if (!this.initialData) {
                        return;
                    }
                    const canvas = document.getElementById('newSubscriptionsChart');
                    if (!canvas) {
                        return;
                    }

                    this.destroyExistingChart(canvas);

                    try {
                        const chartLabels = JSON.parse(JSON.stringify(this.initialData.labels || []));
                        const chartValues = JSON.parse(JSON.stringify(this.initialData.values || []));

                        this.chart = new Chart(canvas, {
                            type: 'bar',
                            data: {
                                labels: chartLabels,
                                datasets: [{
                                    label: 'Langganan Baru',
                                    data: chartValues,
                                    backgroundColor: 'rgba(74, 222, 128, 0.5)',
                                    borderColor: 'rgba(34, 197, 94, 1)',
                                    borderWidth: 1,
                                    borderRadius: 5,
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                animation: false,
                                interaction: {
                                    intersect: false,
                                    mode: 'index'
                                },
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        ticks: {
                                            precision: 0
                                        }
                                    }
                                },
                                plugins: {
                                    legend: {display: false},
                                    tooltip: {
                                        enabled: true,
                                        mode: 'index',
                                        intersect: false
                                    }
                                }
                            }
                        });
                        this.chartInstance = this.chart;
                    } catch (error) {
                    }
                },

                destroyExistingChart(canvas) {
                    const existingChart = Chart.getChart(canvas);
                    if (existingChart) {
                        existingChart.destroy();
                    }
                },

                handleChartUpdate(event) {
                    if (this.updateTimeout) {
                        clearTimeout(this.updateTimeout);
                    }
                    this.updateTimeout = setTimeout(() => {
                        this.processChartUpdate(event);
                    }, 150);
                },

                processChartUpdate(event) {
                    if (this.isUpdating) {
                        return;
                    }

                    let newData = event.detail.data || event.detail;

                    if (!newData || !Array.isArray(newData.labels) || !Array.isArray(newData.values)) {
                        return;
                    }

                    this.updateChart(newData);
                },

                updateChart(newData) {
                    this.isUpdating = true;
                    try {
                        this.initialData = {
                            labels: JSON.parse(JSON.stringify(newData.labels)),
                            values: JSON.parse(JSON.stringify(newData.values))
                        };
                        this.createChart();
                    } catch (error) {
                    } finally {
                        setTimeout(() => {
                            this.isUpdating = false;
                        }, 200);
                    }
                },
            }));
        });
    </script>
@endpush
