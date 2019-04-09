
Ext.define('VIV.store.ClienteStore', {
    extend: 'Ext.data.Store',
    /* Config */
    fields: ["id","ci","nombre_apellidos","calle","entre","apartamento","edificio","casa","telefonos","correo","empresa_id","municipio_id"],
    autoLoad: true,
    sorters: 'ci',
    proxy : {
        type : 'ajax',
        url: '../quejas/cliente/list',
        reader : {
            type            : 'json',
            root            : 'data',
            totalProperty   : 'total',
            successProperty : 'success'
        }
    }
});
