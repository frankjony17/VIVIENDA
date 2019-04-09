
Ext.define('VIV.view.despacho.PlanteamientoGrid', {
    extend: 'Ext.grid.Panel',
    xtype: 'planteamiento-grid',
    /* Config options */
    width: '100%',
    border: 1,
    selType: 'checkboxmodel',
    autoScroll: 1,
    scrollable: 'vertical',
    /* Store */
    store: Ext.create('VIV.store.PlanteamientoStore'),
    /* Columns */
    columns: [
        { "xtype":"rownumberer","text":"No","width":45,"align":"center" },
        { "text":"Id","dataIndex":"id","flex":2,"hidden":true },
        { "text":"Nombre","dataIndex":"nombre","flex":3 },
        { "text":"Descripcion","dataIndex":"descripcion","flex":7 }
    ],
    initComponent: function () {
        var me = this;

        this.tbar = [{
            xtype: 'form',
            url: '../despacho/planteamiento/add',
            padding: '5 5 5 5',
            autoScroll: true,
            frame: false,
            fieldDefaults: {
                width: '9.1%',
                allowBlank: false,
                labelAlign: 'left'
            },
            items: [{
                xtype: 'fieldset',
                layout: 'anchor',
                items: [{
                    xtype: 'textfield',
                    fieldLabel: 'Nombre (Planteamiento)',
                    name: 'planteamiento',
                    flex: 1,
                    afterLabelTextTpl: ['<span style="color:red; font-weight:bold" data-qtip="Required">*</span>']
                }, {
                    xtype: 'textareafield',
                    fieldLabel: 'Descripción',
                    name: 'descripcion',
                    grow: true,
                    flex: 1,
                    afterLabelTextTpl: ['<span style="color:red; font-weight:bold" data-qtip="Required">*</span>']
                }]
            },{
                xtype: 'button',
                text: 'Salvar',
                defaultAlign: 'right'
            }]
        }];
        this.callParent(arguments);
    }
});