
Ext.define('VIV.view.nomenclador.municipio.MunicipioForm', {
    extend: 'Ext.window.Window',
    xtype: 'form-municipio',

    iconCls: '',
    layout: 'fit',
    width: 640,
    resizable: false,
    modal: true,

    initComponent: function () {
        var me = this;

        this.items = [{
            xtype: 'form',
            url: '../nomenclador/municipio/add-edit',
            padding: '10 10 10 10',
            frame: false,
            fieldDefaults: {
                anchor: '100%',
                allowBlank: false,
                labelAlign: 'top'
            },
            items:[{
                xtype: 'container',
                border: false,
                layout: 'hbox',
                items: [{
                    xtype: 'textfield',
                    fieldLabel: 'Nombre',
                    emptyText: 'Nombre',
                    name: 'nombre',
                    /*maskRe: MASKRe,
                    regex: REGEx,*/
                    maxLength: 46,
                    allowBlank: false,
                    flex: 1,
                    afterLabelTextTpl: ['<span style="color:red; font-weight:bold" data-qtip="Required">*</span>'],
                    margin: '0 5 0 0'
                },{
                    xtype: 'textfield',
                    fieldLabel: 'Descripcion',
                    emptyText: 'Descripcion',
                    name: 'descripcion',
                    /*maskRe: MASKRe,
                    regex: REGEx,*/
                    maxLength: 126,
                    allowBlank: true,
                    flex: 1,
                    afterLabelTextTpl: false
                }]
            },{
                xtype: 'container',
                border: false,
                layout: 'anchor',
                items: [{
                    xtype: 'combobox',
                    fieldLabel: 'Provincia',
                    emptyText: 'Provincia',
                    name: 'provincia_id',
                    store: Ext.create('VIV.store.ProvinciaStore'),
                    queryMode: 'local',
                    displayField: 'nombre',
                    valueField: 'id',
                    editable: false,
                    flex: 1,
                    allowBlank: false,
                    afterLabelTextTpl: ['<span style="color:red; font-weight:bold" data-qtip="Required">*</span>']
                }, {
                    xtype: 'hiddenfield',
                    name: 'id'
                }]
            }]
        }];
        this.buttons = [{
            text: me.btnText,
            iconCls: 'fa fa-check'
        },{
            text: 'Cancelar',
            iconCls: 'fa fa-times',
            handler: function() {
                me.close();
            }
        }];
        this.callParent(arguments);
    }
});