@props([
    'type' => 'line', // line, bar, pie, doughnut
    'data' => [],
    'labels' => [],
    'height' => '300px',
    'id' => 'chart-' . uniqid()
])

<div class="bg-white rounded-lg shadow p-6">
    <canvas id="{{ $id }}" height="{{ $height }}"></canvas>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('{{ $id }}').getContext('2d');
    
    const config = {
        type: '{{ $type }}',
        data: {
            labels: @json($labels),
            datasets: [{
                label: 'Data',
                data: @json($data),
                backgroundColor: [
                    'rgba(59, 130, 246, 0.2)',
                    'rgba(16, 185, 129, 0.2)',
                    'rgba(245, 158, 11, 0.2)',
                    'rgba(239, 68, 68, 0.2)',
                    'rgba(139, 92, 246, 0.2)',
                ],
                borderColor: [
                    'rgba(59, 130, 246, 1)',
                    'rgba(16, 185, 129, 1)',
                    'rgba(245, 158, 11, 1)',
                    'rgba(239, 68, 68, 1)',
                    'rgba(139, 92, 246, 1)',
                ],
                borderWidth: 2,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.1)'
                    }
                },
                x: {
                    grid: {
                        color: 'rgba(0, 0, 0, 0.1)'
                    }
                }
            }
        }
    };
    
    new Chart(ctx, config);
});
</script>
@endpush 