
Ext.define('VIV.store.RespuestaStore', {
    extend: 'Ext.data.Store',
    /* Config */
    fields: [
        "id", "fecha", "cliente", "respuesta", "observacion", "estado", "respuesta-data"
    ],
    autoLoad: true,
    sorters: 'cliente',
    groupField: 'fecha',
    proxy : {
        type : 'ajax',
        url: '../quejas/respuesta/list',
        reader : {
            type            : 'json',
            root            : 'data',
            totalProperty   : 'total',
            successProperty : 'success'
        }
    }
});
