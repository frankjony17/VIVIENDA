
Ext.define('VIV.view.quejas.cliente.ClienteForm', {
    extend: 'Ext.window.Window',
    xtype: 'form-cliente',

    iconCls: '',
    layout: 'fit',
    modal: true,
    resizable: false,
    width: 840,

    initComponent: function () {
        var me = this;
        this.items = [{
            xtype: 'form',
            url: '../quejas/cliente/add-edit',
            padding: '10 10 10 10',
            autoScroll: true,
            frame: false,
            fieldDefaults: {
                anchor: '100%',
                allowBlank: false,
                labelAlign: 'top'
            },
            items:[{
                xtype: 'fieldset',
                layout: 'anchor',
                items: [{
                    xtype: 'container',
                    border: false,
                    layout: 'hbox',
                    anchor: '100%',
                    items: [{
                        xtype: 'textfield',
                        fieldLabel: 'CI',
                        emptyText: 'Carnet de Identidad (CI)',
                        name: 'ci',
                        maskRe: /[0-9]/,
                        flex: 1,
                        margin: '0 5 0 0',
                        afterLabelTextTpl: ['<span style="color:red; font-weight:bold" data-qtip="Required">*</span>'],
                        validator: function(val){var date=new Date(),date=date.getFullYear();if(val.length>11||val.length<11){if(val.length===0){return true;}else{return "El tamaño máximo para el <b>CI</b> es de <b>11</b> caracteres.";}}else{if(val.length===11){var year=date-val.slice(0,2),month=parseInt(val.slice(2,4)),day=parseInt(val.slice(4,6)),edad=String(year).slice(2,4);if(edad<18||edad>85){return "La edad de la persona debe estar ente los <b>18</b> y <b>85</b> años.<br>El año del <b>CI</b> debe estar entre 19<b>30</b> y 19<b>97</b><br><br>";}if(month<1||month>12){return "El mes de nacimiento es incorreco, <b>NO EXISTE!!!</b>.";}if (day < 1 || day > 31) {return "El día de nacimiento es incorreco, <b>NO EXISTE!!!</b>.";}return true;}return true;}}
                    }, {
                        xtype: 'textfield',
                        fieldLabel: 'Nombre',
                        emptyText: 'Nombre de la Persona',
                        name: 'nombre',
                        maskRe: /[A-Za-z-áéíóú\s]/,
                        regex: /^[A-Z][a-zá-ú]/,
                        regexText: 'El nombre deben de estar en el formato: <b>Nnnn Nnnn</b><br><b>Ej: Yordanis</b><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Yordanis</b>',
                        maxLength: 30,
                        margin: '0 5 0 0',
                        flex: 1,
                        afterLabelTextTpl: ['<span style="color:red;font-weight:bold" data-qtip="Required">*</span>'],
                        listeners: {change:function(field){var n=field.getValue().split(' ');n.length>1?field.setValue(n[0]+' '+n[1]):null;}}
                    }, {
                        xtype: 'textfield',
                        fieldLabel: 'Apellidos',
                        emptyText: 'Apellidos de la Persona',
                        name: 'apellidos',
                        maskRe: /[A-Za-z-áéíóú\s]/,
                        regex: /^[A-Z][a-zá-ú]+\s[A-Z][a-zá-ú]+$/,
                        regexText: 'Los apellidos deben de estar en el formato: <b>Nnnn Nnnn</b><br>Ej: <b>Brombergues Rodriguez</b>',
                        maxLength: 30,
                        margin: '0 5 0 0',
                        flex: 1,
                        afterLabelTextTpl: ['<span style="color:red;font-weight:bold" data-qtip="Required">*</span>']
                    }]
                }]
            }, {
                xtype: 'fieldset',
                layout: 'anchor',
                items: [{
                    xtype: 'container',
                    title: 'Dirección',
                    border: false,
                    layout: 'hbox',
                    items: [{
                        xtype: 'textfield',
                        fieldLabel: 'Calle',
                        emptyText: 'Calle',
                        name: 'calle',
                        maxLength: 43,
                        allowBlank: true,
                        flex: 1,
                        margin: '0 5 0 0'
                    }, {
                        xtype: 'textfield',
                        fieldLabel: 'Entre (/)',
                        emptyText: 'Entre (/)',
                        name: 'entre',
                        maxLength: 43,
                        allowBlank: true,
                        flex: 1,
                        margin: '0 5 0 0'
                    }, {
                        xtype: 'textfield',
                        fieldLabel: 'Apartamento (#)',
                        emptyText: 'Apartamento (#)',
                        name: 'apartamento',
                        maskRe: /[0-9]/,
                        regex: /[0-9]/,
                        maxLength: 10,
                        allowBlank: true,
                        flex: 1,
                        margin: '0 5 0 0'
                    }, {
                        xtype: 'textfield',
                        fieldLabel: 'Escalera (#)',
                        emptyText: 'Escalera (#)',
                        name: 'edificio',
                        maskRe: /[0-9]/,
                        regex: /[0-9]/,
                        maxLength: 10,
                        allowBlank: true,
                        flex: 1,
                        margin: '0 5 0 0'
                    }, {
                        xtype: 'textfield',
                        fieldLabel: 'Casa (#)',
                        emptyText: 'Casa (#)',
                        name: 'casa',
                        maskRe: /[0-9]/,
                        regex: /[0-9]/,
                        maxLength: 10,
                        allowBlank: true,
                        flex: 1
                    }]
                }]
            },{
                xtype: 'fieldset',
                layout: 'anchor',
                items: [{
                    xtype: 'container',
                    border: false,
                    layout: 'hbox',
                    items: [{
                        xtype: 'textfield',
                        fieldLabel: 'Correo electrónico',
                        emptyText: 'Correo electrónico',
                        name: 'email',
                        vtype:'email',
                        maxLength: 48,
                        allowBlank: true,
                        flex: 1,
                        margin: '0 5 0 0'
                    },{
                        xtype: 'combobox',
                        fieldLabel: 'Municipio',
                        emptyText: 'Municipio',
                        name: 'municipio',
                        store: Ext.create('VIV.store.MunicipioStore'),
                        queryMode: 'local',
                        displayField: 'nombre',
                        valueField: 'id',
                        editable: false,
                        flex: 1,
                        margin: '0 5 0 0',
                        afterLabelTextTpl: ['<span style="color:red; font-weight:bold" data-qtip="Required">*</span>']
                    },{
                        xtype: 'combobox',
                        fieldLabel: 'Empresa',
                        emptyText: 'Empresa',
                        name: 'empresa',
                        store: Ext.create('VIV.store.EmpresaStore'),
                        queryMode: 'local',
                        displayField: 'nombre',
                        valueField: 'id',
                        editable: false,
                        flex: 2,
                        afterLabelTextTpl: ['<span style="color:red; font-weight:bold" data-qtip="Required">*</span>']
                    }]
                }]
            },{
                xtype: 'hiddenfield',
                name: 'id'
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