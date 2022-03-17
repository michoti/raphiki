$(document).ready(function(){

    drawChart();

});


function drawChart(){

    $.ajax({
        url: '.././codes/chart.php',
        method : "POST",
        data : {action : 'fetch'},
        dataType : 'JSON',
        success : function(data)
        {
          
            let users = [];
            let counsellors = [];

            for(let i in data)
            {
                users.push(data[i].users);
                counsellors.push(data[i].counsellors);
            }

           var usersCount = getOccurrence(users, true);
           var counsellorsCount = getOccurrence(counsellors, true);

            console.log(usersCount);
            console.log(counsellorsCount);



            const chart_data = {
                labels: ['victims', 'counsellors'] ,
                datasets:[
                    {
                        label: 'system users',
                        backgroundColor: ['#49e2ff', '#005ce6', '#739900'],
                        borderColor: '#4d4d4d',
                        hoverBackgroundColor: '#4d4d4d',
                        hoverBorderColor: '#4d4d4d',
                        data: [usersCount, counsellorsCount]
                    }
                ]
            };

            const options = {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            };

            const group_chart1 = document.getElementById('bar-chart').getContext('2d');

            const graph1 = new Chart(group_chart1, {
                type:"bar",
                data: chart_data,
                options: options
            });



        }

    });
}


function getOccurrence(array, value) {
    return array.filter((v) => (v === value)).length;
}