<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Untitled Document</title>
<link href="{{ asset('css/muli.css') }}">
</head>

<body>

<div id="panel">
<table style="border:1px solid #999999;" width="100%" border="0" cellpadding="0" cellspacing="0" class="tb">
  <tbody>
    <tr>
      <td height="35" colspan="4" align="center" class="txt" style="border-bottom:1px solid #ddd; color:#d04e00; font-weight:bold; font-family: 'Muli', sans-serif; font-size: 22px">
        RESUMEN DE COMPRA
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif; text-align: right;" >
              <img src="{{ asset('img/logo/logo.jpg') }}" alt="" style="width: 20%">
            </td>
          </tr>
        </tbody>
      </table></td>
      <td>&nbsp;</td>
    </tr>

    <tr>
      <td height="20" colspan="4">&nbsp;</td>
    </tr>

    <tr>
      <td width="3%">&nbsp;</td>
      <td colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tb1">
        <tbody>
          <tr>
            <td>
              <table style="border:1px solid #999999;" width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                  <tr>
                    <td width="16%" height="25">
                      <strong>
                        <span style=" font-size:14px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">
                          E-mail:
                        </span>
                      </strong>
                    </td>

                    <td width="49%">
                      <span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">
                        {{ session()->get('datos_cliente')['email_cliente'] }}
                      </span>
                    </td>

                    <td width="20%">
                      <strong>
                        <span style=" font-size:14px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">
                          Fecha:
                        </span>
                      </strong>
                    </td>

                    <td width="15%">
                      <span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">
                        {{ date('d-m-Y') }}
                      </span>
                    </td>
                  </tr>

                  <tr>
                    <td height="25">
                      <strong>
                        <span style=" font-size:14px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">
                          Dirección:
                        </span>
                      </strong>
                    </td>

                    <td>
                      <span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">
                        {{ session()->get('datos_cliente')['direccion_cliente'] }}
                      </span>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>

          <tr>
            <td height="31" style="border-top:1px solid #999999;">&nbsp;</td>
          </tr>

          <tr>
            <td><table style="border:1px solid #999999;" width="100%" border="1" cellpadding="0" cellspacing="0" class="tb2">
              <tbody>
                <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">
                  <td width="7%" height="30" align="center">
                    <strong>#</strong>
                  </td>
                  <td width="56%" align="center">
                    <strong>Producto</strong>
                  </td>
                  <td width="18%" align="center">
                    <strong>Cantidad</strong>
                  </td>
                  <td width="19%" align="center">
                    <strong>Subtotal</strong>
                  </td>
                </tr>

                @foreach($cart['productos'] as $producto)
                  <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">
                    <td height="30" align="center">{{ $contador++ }}</td>
                    <td align="center">{{ $producto['nombre'] }}</td>
                    <td align="center">{{ $producto['cantidad'] }}</td>
                    <td align="center">
                      {{ number_format(($producto['precio'] * $producto['cantidad']) , 2, '.' , ' ') }} MXM
                    </td>
                  </tr>
                @endforeach

                  <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">
                    <td height="30" align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center"><strong>TOTAL <small>(+envío)</small></strong></td>
                    <td align="center">{{ number_format(($cart['total'] + $cart['envio']) , 2, '.', ' ') }} MXM</td>
                  </tr>
              </tbody>
            </table></td>
          </tr>

          <tr>
            <td>&nbsp;</td>
          </tr>
        </tbody>
      </table></td>
      <td width="3%">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td height="32">&nbsp;</td>
      <td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;" width="47%" height="32">
        <strong>&nbsp;</strong>
      </td>

      <td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;" width="47%" align="right">
        <strong>Ilhami - &copy;</strong>
      </td>
      <td height="32">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
  </tbody>
</table>
</div>


</body>
</html>
