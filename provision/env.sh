#!/bin/bash

echo '--- Environment variables ---'

# Set environment variable
cat <<EOF > /etc/profile.d/env.sh
export VM_DB_NAME="${1}"
export VM_DB_USER="${2}"
export VM_DB_PASSWORD="${3}"
export VM_PHP_VERSION="${4}"
export VM_PHP_TIME_ZONE="${5}"
export VM_PHP_DEBUG_FPM_IP="${6}"
export VM_PHP_DEBUG_CLI_IP="${7}"
export VM_SITE_PATH="${8}"
export VM_SITE_HOST="${9}"
export VM_SERVER_ALIASES='${10}'
export VM_COMPOSER_AUTH="${11}"
export VM_MAGENTO_INSTALL="${12}"
export VM_MAGENTO_VERSION="${13}"
export VM_MAGENTO_EDITION="${14}"
export VM_MAGENTO_MODE="${15}"
export VM_MAGENTO_SAMPLE="${16}"
export VM_MAGENTO_LANGUAGE="${17}"
export VM_MAGENTO_CURRENCY="${18}"
export VM_MAGENTO_TIME_ZONE="${19}"

EOF
source /etc/profile.d/env.sh

# Source and display
source /etc/profile
cat /etc/profile.d/env.sh
