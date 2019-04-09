
Ext.define('VIV.store.DespachoStore', {
    extend: 'Ext.data.Store',
    /* Config */
    fields: [
        "id","fecha_creacion","fecha_culminacion","cliente","asunto","data","estado"
    ],
    autoLoad: true,
    sorters: 'fecha_creacion',
    groupField: 'estado',
    proxy : {
        type : 'ajax',
        url: '../despacho/list',
        reader : {
            type            : 'json',
            root            : 'data',
            totalProperty   : 'total',
            successProperty : 'success'
        }
    }
});
