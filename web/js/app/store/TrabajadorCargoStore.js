
Ext.define('VIV.store.TrabajadorCargoStore', {
    extend: 'Ext.data.Store',
    /* Config */
    fields: ["id","nombre","descripcion"],
    autoLoad: true,
    sorters: 'nombre',
    proxy : {
        type : 'ajax',
        url: '../nomenclador/trabajador_cargo/list',
        reader : {
            type            : 'json',
            root            : 'data',
            totalProperty   : 'total',
            successProperty : 'success'
        }
    }
});
