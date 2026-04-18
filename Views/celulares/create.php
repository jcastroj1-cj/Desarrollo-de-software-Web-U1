<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Celular</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            background-color: #0f0f0f;
            color: #f0f0f0;
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            justify-content: center;
            padding: 40px 20px;
        }

        .card {
            background-color: #1a1a1a;
            border: 1px solid #2a2a2a;
            border-radius: 12px;
            padding: 40px;
            width: 100%;
            max-width: 600px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.5);
        }

        h1 { font-size: 24px; margin-bottom: 8px; color: #ffffff; }

        p.subtitle { color: #888; font-size: 14px; margin-bottom: 28px; }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .full { grid-column: span 2; }

        label { display: block; font-size: 13px; color: #aaa; margin-bottom: 6px; }

        input, select {
            width: 100%;
            padding: 10px 14px;
            background-color: #252525;
            border: 1px solid #333;
            border-radius: 8px;
            color: #f0f0f0;
            font-size: 14px;
            outline: none;
            transition: border 0.2s;
        }

        input:focus, select:focus { border-color: #6c63ff; }

        .checkbox-group {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 8px;
        }

        .checkbox-item {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 13px;
            color: #aaa;
        }

        .checkbox-item input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: #6c63ff;
        }

        .section-title {
            font-size: 13px;
            color: #6c63ff;
            margin: 20px 0 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #6c63ff;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            cursor: pointer;
            margin-top: 24px;
            transition: background 0.2s;
        }

        button:hover { background-color: #574fd6; }

        .back { 
            text-align: center; 
            margin-top: 16px; 
            font-size: 13px; 
            color: #888; 
        }

        .back a { color: #6c63ff; text-decoration: none; }
        .back a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="card">
        <h1>📱 Registrar Celular</h1>
        <p class="subtitle">Completa los datos del dispositivo</p>

        <form method="POST" action="?route=celular.store">

            <p class="section-title">Información básica</p>
            <div class="grid">
                <div>
                    <label>Marca</label>
                    <input name="marca" type="text" placeholder="Samsung">
                </div>
                <div>
                    <label>IMEI</label>
                    <input name="imei" type="number" placeholder="123456789012345">

                </div>
                <div>
                    <label>Pulgadas</label>
                    <input name="pulgadas" type="number" step="0.1" placeholder="6.5">
                </div>
                <div>
                    <label>Megapixeles</label>
                    <input name="megapixeles" type="number" step="0.1" placeholder="108">
                </div>
                <div>
                    <label>RAM (GB)</label>
                    <input name="ram" type="number" placeholder="8">
                </div>
                <div>
                    <label>Almacenamiento Principal (GB)</label>
                    <input name="almacenamientoPrincipal" type="number" placeholder="128">
                </div>
                <div>
                    <label>Almacenamiento Secundario (GB)</label>
                    <input name="almacenamientoSecundario" type="number" placeholder="256">
                </div>
                <div>
                    <label>Sistema Operativo</label>
                    <input name="sistemaOperativo" type="text" placeholder="Android 14">
                </div>
                <div>
                    <label>Operador</label>
                    <input name="operador" type="text" placeholder="Claro">
                </div>
                <div>
                    <label>Tecnología de Banda</label>
                    <input name="tecnologiaBanda" type="text" placeholder="5G">
                </div>
                <div>
                    <label>Cámaras</label>
                    <input name="camaras" type="number" placeholder="3">
                </div>
                <div>
                    <label>Cantidad de SIM</label>
                    <input name="cantidadSim" type="number" placeholder="2">
                </div>
            </div>

            <p class="section-title">Procesador</p>
            <div class="grid">
                <div>
                    <label>Marca CPU</label>
                    <input name="marcaCpu" type="text" placeholder="Snapdragon">
                </div>
                <div>
                    <label>Velocidad CPU (GHz)</label>
                    <input name="velocidadCpu" type="number" step="0.1" placeholder="3.2">
                </div>
            </div>

            <p class="section-title">Conectividad y extras</p>
            <div class="checkbox-group">
                <label class="checkbox-item">
                    <input type="checkbox" name="wifi"> WiFi
                </label>
                <label class="checkbox-item">
                    <input type="checkbox" name="bluetooth"> Bluetooth
                </label>
                <label class="checkbox-item">
                    <input type="checkbox" name="nfc"> NFC
                </label>
                <label class="checkbox-item">
                    <input type="checkbox" name="huella"> Huella
                </label>
                <label class="checkbox-item">
                    <input type="checkbox" name="ir"> IR
                </label>
                <label class="checkbox-item">
                    <input type="checkbox" name="resisteAgua"> Resiste Agua
                </label>
            </div>

            <button type="submit">Guardar Celular</button>
        </form>

        <div class="back">
            <a href="?route=celular.index">← Volver a la lista</a>
        </div>
    </div>
</body>
</html>