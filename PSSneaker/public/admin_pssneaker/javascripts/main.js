$(document).ready(function() {
    Morris.Donut({
        element: 'chart_donut',
        data: [
            { label: 'Africa', value: 5 },
            { label: 'Asia', value: 5 },
            { label: 'Europe', value: 14 },
            { label: 'North America', value: 3 },
            { label: 'South America', value: 5 }
        ]
    });
});