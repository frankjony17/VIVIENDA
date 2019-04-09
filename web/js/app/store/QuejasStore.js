
Ext.define('VIV.store.QuejasStore', {
    extend: 'Ext.data.Store',
    /* Config */
    fields: [
        "id","fecha","estado","fecha_culminacion",
        "cliente","entrevista_id","quejas_tipo_id",
        "respuesta-id","respuesta-respuesta","respuesta-observacion",
        "respuesta-data"
    ],
    sorters: 'cliente',
    groupField: 'fecha',
    proxy : {
        type : 'ajax',
        url: '../quejas/list',
        reader : {
            type            : 'json',
            root            : 'data',
            totalProperty   : 'total',
            successProperty : 'success'
        }
    }
});
