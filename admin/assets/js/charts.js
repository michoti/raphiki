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

            // console.log(usersCount);
            // console.log(counsellorsCount);



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


    $.ajax({
        url: '.././codes/chart.php',
        method : "POST",
        data : {action : 'case-time'},
        dataType : 'JSON',
        success : function(data)
        {
                      
            // let cases = [];

            // for(let i in data)
            // {
            //     cases.push({
            //         x : data[i]cases,
            //         y : data[i]date
            //     });
            // }

            // console.log(cases);


            const chart_data = {
                datasets:[
                    {
                        label: 'cases with respect to time',
                        backgroundColor: '#49e2ff',
                        borderColor: '#4d4d4d',
                        hoverBackgroundColor: '#4d4d4d',
                        hoverBorderColor: '#4d4d4d',
                        data: data
                    }
                ]
            };

            const options = {
                responsive: true,
                scales: {
                    x: {
                        type: 'time',
                        time: {
                            unit: 'week'
                        }
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            };

            const group_chart1 = document.getElementById('line-graph').getContext('2d');

            const graph1 = new Chart(group_chart1, {
                type:"line",
                data: chart_data,
                options: options
            });
        }

    });

    $.ajax({

        url:'.././codes/chart.php',
        method : "POST",
        data : {action : 'fetch-status'},
        dataType : 'JSON',
        success : function(data)
        {
            let cases = [];

            for(let i in data)
            {
                cases.push(data[i].status);
            }

           var unsolvedCount = getOccurrence(cases, '0');
           var pendingCount = getOccurrence(cases, '1');
           var solvedCount = getOccurrence(cases, '2');

            console.log(unsolvedCount);
            console.log(pendingCount);
            console.log(solvedCount);
            console.log(cases);



            const chart_data = {
                labels: ['unsolved', 'solved', 'pending'] ,
                datasets:[
                    {
                        label: 'solved & unsolved cases',
                        backgroundColor: ['#49e2ff', '#005ce6', '#739900'],
                        hoverBackgroundColor: '#4d4d4d',
                        hoverBorderColor: '#4d4d4d',
                        data: [unsolvedCount, solvedCount, pendingCount]
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

            const group_chart3 = document.getElementById('pie-chart').getContext('2d');

            const graph3 = new Chart(group_chart3, {
                type:"pie",
                data: chart_data,
                options: options
            });

        }

    });
}


function getOccurrence(array, value) {
    return array.filter((v) => (v === value)).length;
}