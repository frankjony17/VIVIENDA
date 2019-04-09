
Ext.define('VIV.view.despacho.AcuerdosPlanteamientosForm', {
    extend: 'Ext.window.Window',
    xtype: 'acuerdos-planteamientos-form',

    title: "Despacho <b>(Acuerdos/Planteamientos)</b>",
    iconCls: '',
    layout: 'fit',
    modal: true,
    maximized: true,
    resizable: false,

    initComponent: function () {
        var me = this;

        console.log(me.heightViwport);

        this.items = [{
            xtype: 'panel',
            padding: '10 10 10 10',
            frame: false,
            items:[{
                title: 'Planteamientos',
                items: Ext.create('VIV.view.despacho.PlanteamientoGrid', {
                    height: me.heightViwport
                }),
                margin: '0 0 5 0'
            }, {
                title: 'Acuerdos',
                items: Ext.create('VIV.view.nomenclador.clasificacion.ClasificacionGrid', {
                    height: me.heightViwport
                }),
            }]
        }];
        this.callParent(arguments);
    }
});