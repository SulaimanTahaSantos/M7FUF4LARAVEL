#!/bin/bash

# Este script soluciona el problema de colisión de archivos LICENSE
# que ocurre durante el despliegue en Railway con Nixpacks

echo "Iniciando solución para el problema de colisión de archivos LICENSE..."

# Crear el directorio nixpacks si no existe
mkdir -p .nixpacks

# Crear un archivo de configuración personalizado para Nix
cat > .nixpacks/config.nix << EOL
{
  packageOverrides = pkgs: {
    yarnWithoutLicense = pkgs.yarn.overrideAttrs (oldAttrs: {
      preInstall = ''
        # Renombrar el archivo LICENSE para evitar colisión
        if [ -f package/LICENSE ]; then
          mv package/LICENSE package/LICENSE.yarn
        fi
      '';
    });

    composerWithoutLicense = pkgs.composer.overrideAttrs (oldAttrs: {
      preInstall = ''
        # Renombrar el archivo LICENSE para evitar colisión
        if [ -f LICENSE ]; then
          mv LICENSE LICENSE.composer
        fi
      '';
    });
  };
}
EOL

echo "Archivo de configuración de Nix creado para evitar colisiones de LICENSE."
echo "Ahora puedes desplegar en Railway sin problemas."
