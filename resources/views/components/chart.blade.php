<div class="h-[{{ $height }}px] w-[{{ $width }}px]">
    <canvas id="{{ $chartId }}"></canvas>
</div>
<script>
    const ctx_{{ $chartId }} = document.getElementById('{{ $chartId }}');
    new Chart(ctx_{{ $chartId }}, {
        type: '{{ $type }}',
        data: {
            labels: @json($labels),
            datasets: [{
                    data: @json($data)
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: '{{ $name }}'
                }
            }
        }
    });
</script>
