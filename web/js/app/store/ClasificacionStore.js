
Ext.define('VIV.store.ClasificacionStore', {
    extend: 'Ext.data.Store',
    /* Config */
    fields: ["id","nombre","descripcion"],
    autoLoad: true,
    sorters: 'nombre',
    proxy : {
        type : 'ajax',
        url: '../nomenclador/clasificacion/list',
        reader : {
            type            : 'json',
            root            : 'data',
            totalProperty   : 'total',
            successProperty : 'success'
        }
    }
});
