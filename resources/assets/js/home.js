var Home = {
    init: function () {
        Home.csrf_token = $('meta[name="csrf-token"]').attr('content');

        if (document.getElementById("donutChart")) {
            Home.initGraph();
            $("#donutChart").mouseenter(function () {
                Home.initGraph();
            });
        }
    },

    initGraph: function () {
        $.ajax({
            type: "POST",
            url: "/ajax/home/chartUpdate",
            data: {
                _token: Home.csrf_token
            },
            success: function (res) {
                if (res['status'] === "success") {
                    // récupère les produits
                    var product = res['products'];
                    var ctx = $("#donutChart");

                    // tableau pour l'insertion des données dans la chart
                    var labels = [];
                    var datas = [];
                    var backgroundColors = [];

                    for (var i = 0; i < product.length; i++) {
                        // labels
                        labels.push(product[i].name);
                        // datas
                        datas.push(product[i].quantity);
                        // background-colors
                        backgroundColors.push(product[i].color);
                    }

                    new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: '# of Votes',
                                data: datas,
                                backgroundColor: backgroundColors
                            }]
                        },
                        options: {}
                    });
                }
            }
        });
    }
};

// noinspection JSUnresolvedVariable
module.exports = Home;