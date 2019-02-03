$(function () {

    function fnFormatDetails(oTable, nTr, idCliente) {
        var aData = oTable.fnGetData(nTr);
        var sOut = '';

        return sOut;
    }

    /*  Insert a 'details' column to the table  */
    var nCloneTh = document.createElement('th');
    var nCloneTd = document.createElement('td');
    nCloneTd.innerHTML = '<i style="color: #C75757" class="fa fa-plus-square-o"></i>';
    nCloneTd.className = "center";

    $('#table2 thead tr').each(function () {
        this.insertBefore(nCloneTh, this.childNodes[0]);
    });

    $('#table2 tbody tr').each(function () {
        this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
    });

    /*  Initialse DataTables, with no sorting on the 'details' column  */
    var oTable = $('#table2').dataTable({
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [0]
        }],
        "aaSorting": [
            [1, 'asc']
        ]
    });

    /*  Add event listener for opening and closing details  */
    $(document).on('click', '#table2 tbody td i', function () {
        var nTr = $(this).parents('tr')[0];
        var idCliente = nTr.id;
        var anno = $('#ventasclienteanalisis').val();
        if (oTable.fnIsOpen(nTr)) {
            /* This row is already open - close it */
            $(this).removeClass().addClass('fa fa-plus-square-o');
            $('.details').remove();
            oTable.fnClose(nTr);
        } else {
            /* Open this row */
            $(this).removeClass().addClass('fa fa-minus-square-o');
            var sOut = '<tr class="load"><td></td><td> </td><td> </td><td> </td><td><div id="cargando" class="text-center"><h2><i class="fa fa-spinner fa-spin"></i></h2></div></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
            oTable.fnOpen(nTr, sOut, 'load');
            $.ajax({
                url: href="http:" + "cliente/" + idCliente + "/" + anno,
                type: 'get',
                async: true,
                data: null,
                success: function (response) {
                    sOut = '';
                    for (var i = 0; i < response[0].length; i++){
                        var cantdias = moment(response[0][i].fecha.date, 'YYYY-MM-DD').fromNow(true);
                        var ronat = (response[0][i].retonat != null) ? response[0][i].retonat : 0;
                        var ireprecentacion = (response[0][i].importereprec != null) ? response[0][i].importereprec : 0;
                        var ingresoneto = (response[0][i].ingresoneto != null) ? response[0][i].ingresoneto : 0;
                        sOut += '<tr class="details"> <td> </td><td> </td><td>' + response[0][i].numerofactura + '</td><td> </td><td> </td><td>' + response[0][i].tipoventa + '</td><td>' + cantdias + '</td><td>' + response[0][i].importetotalcuc.toFixed(2) + '</td><td>' + ingresoneto.toFixed(2) + '</td><td>' + ireprecentacion.toFixed(2) + '</td><td>' + ronat.toFixed(2) + '</td>' +
                            '<td>'+ ((response[0][i].ingresoneto * response[1][0].costomaterial)/100).toFixed(2) +'</td><td>'+ ((response[0][i].ingresoneto * response[1][0].costosalario)/100).toFixed(2) +'</td><td>'+ ((response[0][i].ingresoneto * response[1][0].costofijo)/100).toFixed(2) +'</td><td>'+ ((response[0][i].ingresoneto * response[1][0].acumulacion)/100).toFixed(2) +'</td>' +
                            '<td>'+ ((response[0][i].ingresoneto * response[1][0].onat)/100).toFixed(2) +'</td><td>'+ ((response[0][i].ingresoneto * response[1][0].ganancia)/100).toFixed(2) +'</td></tr>'
                    }
                    for (var i = 0; i < response[2].length; i++){
                        var cantdias = moment(response[2][i].fecha.date, 'YYYY-MM-DD').fromNow(true);
                        var ronat = (response[2][i].retonat != null) ? response[2][i].retonat : 0;
                        var ireprecentacion = (response[2][i].importereprec != null) ? response[2][i].importereprec : 0;
                        var ingresoneto = (response[2][i].ingresoneto != null) ? response[2][i].ingresoneto : 0;
                        sOut += '<tr class="details"> <td> </td><td> </td><td>' + response[2][i].numerofactura + '</td><td> </td><td>' + response[2][i].importetotalcuc.toFixed(2) + '</td><td>' + response[2][i].tipoventa + '</td><td>' + cantdias + '</td><td></td><td>' + ingresoneto.toFixed(2) + '</td><td>' + ireprecentacion.toFixed(2) + '</td><td>' + ronat.toFixed(2) + '</td>' +
                            '<td>'+ ((response[2][i].ingresoneto * response[1][0].costomaterial)/100).toFixed(2) +'</td><td>'+ ((response[2][i].ingresoneto * response[1][0].costosalario)/100).toFixed(2) +'</td><td>'+ ((response[2][i].ingresoneto * response[1][0].costofijo)/100).toFixed(2) +'</td><td>'+ ((response[2][i].ingresoneto * response[1][0].acumulacion)/100).toFixed(2) +'</td>' +
                            '<td>'+ ((response[2][i].ingresoneto * response[1][0].onat)/100).toFixed(2) +'</td><td>'+ ((response[2][i].ingresoneto * response[1][0].ganancia)/100).toFixed(2) +'</td></tr>'
                    }
                    $('.load').remove();
                    oTable.fnOpen(nTr, sOut, 'details');
                },
                error: function (error) {
                    console.log(error);
                }
            });

        }
    });

});