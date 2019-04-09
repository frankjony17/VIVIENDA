
Ext.define('VIV.store.AccionesStore', {
    extend: 'Ext.data.Store',
    /* Config */
    fields: [
        "id", "fecha", "nombre", "descripcion", "queja_respuesta_id"
    ],
    autoLoad: true,
    proxy : {
        type : 'ajax',
        url: '../quejas/acciones/list',
        reader : {
            type            : 'json',
            root            : 'data',
            totalProperty   : 'total',
            successProperty : 'success'
        }
    }
});
