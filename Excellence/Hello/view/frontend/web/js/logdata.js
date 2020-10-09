function sortTable(n) {
    var table;
    table = document.getElementById("table");
    var rows, i, x, y, count = 0;
    var switching = true;

    var direction = "ascending";


    while (switching) {
        switching = false;
        var rows = table.rows;


        for (i = 1; i < (rows.length - 1); i++) {
            var Switch = false;


            x = rows[i].getElementsByTagName("TD")[n];
            y = rows[i + 1].getElementsByTagName("TD")[n];
            var val1 = x.innerHTML.toLowerCase();
            var val2 = y.innerHTML.toLowerCase();

            if (direction == "ascending") {

                if (val1 > val2) {

                    Switch = true;
                    break;
                }
            } else if (direction == "descending") {


                if (val1 < val2) {

                    Switch = true;
                    break;
                }
            }
        }
        if (Switch) {

            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;


            count++;
        } else {

            if (count == 0 && direction == "ascending") {
                direction = "descending";
                switching = true;
            }
        }
    }
};

function sortId() {
    var table;
    table = document.getElementById("table");
    var rows, i, x, y, count = 0;
    var switching = true;

    var direction = "ascending";


    while (switching) {
        switching = false;
        var rows = table.rows;


        for (i = 1; i < (rows.length - 1); i++) {
            var Switch = false;


            x = rows[i].getElementsByTagName("TD")[0];
            y = rows[i + 1].getElementsByTagName("TD")[0];
            var val1 = x.innerHTML;
            var val2 = y.innerHTML;

            if (direction == "ascending") {

                if (Number(val1) > Number(val2)) {

                    Switch = true;
                    break;
                }
            } else if (direction == "descending") {


                if (Number(val1) < Number(val2)) {

                    Switch = true;
                    break;
                }
            }
        }
        if (Switch) {

            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;


            count++;
        } else {

            if (count == 0 && direction == "ascending") {
                direction = "descending";
                switching = true;
            }
        }
    }
};