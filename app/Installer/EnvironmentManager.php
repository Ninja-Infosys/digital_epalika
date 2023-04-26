<?php

namespace App\Installer;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EnvironmentManager
{
    /**
     * @var string
     */
    private $envPath;

    /**
     * @var string
     */
    private $envExamplePath;

    /**
     * Set the .env and .env.example paths.
     */
    public function __construct()
    {
        $this->envPath = base_path('.env');
        $this->envExamplePath = base_path('.env.example');
    }

    /**
     * Get the content of the .env file.
     *
     * @return string
     */
    public function getEnvContent()
    {
        if (!file_exists($this->envPath)) {
            if (file_exists($this->envExamplePath)) {
                copy($this->envExamplePath, $this->envPath);
            } else {
                touch($this->envPath);
            }
        }

        return file_get_contents($this->envPath);
    }

    /**
     * Get the the .env file path.
     *
     * @return string
     */
    public function getEnvPath()
    {
        return $this->envPath;
    }

    /**
     * Get the the .env.example file path.
     *
     * @return string
     */
    public function getEnvExamplePath()
    {
        return $this->envExamplePath;
    }

    /**
     * Save the edited content to the .env file.
     *
     * @param Request $input
     * @return string
     */
    public function saveFileClassic(Request $input)
    {
        $message = trans('installer_messages.environment.success');

        try {
            file_put_contents($this->envPath, $input->get('envConfig'));
        } catch (Exception $e) {
            $message = trans('installer_messages.environment.errors');
        }

        return $message;
    }

    /**
     * Save the form content to the .env file.
     *
     * @param Request $request
     * @return string
     */
    public function saveFileWizard(Request $request)
    {
        $results = trans('installer_messages.environment.success');

        $envFileData =
            'APP_NAME=\'' . $request->app_name . "'\n" .
            'APP_ENV=' . $request->environment . "\n" .
            'APP_KEY=' . 'base64:' . base64_encode(Str::random(32)) . "\n" .
            'APP_DEBUG=' . $request->app_debug . "\n" .
            'APP_URL=' . $request->app_url . "\n\n" .
            'DB_CONNECTION=' . $request->database_connection . "\n" .
            'DB_HOST=' . $request->database_hostname . "\n" .
            'DB_PORT=' . $request->database_port . "\n" .
            'DB_DATABASE=' . $request->database_name . "\n" .
            'DB_USERNAME=' . $request->database_username . "\n" .
            'DB_PASSWORD=' . $request->database_password . "\n\n" .
            'BROADCAST_DRIVER=' . $request->broadcast_driver . "\n" .
            'CACHE_DRIVER=' . $request->cache_driver . "\n" .
            'SESSION_DRIVER=' . $request->session_driver . "\n" .
            'QUEUE_DRIVER=' . $request->queue_driver . "\n\n" .
            'REDIS_HOST=' . $request->redis_hostname . "\n" .
            'REDIS_PASSWORD=' . $request->redis_password . "\n" .
            'REDIS_PORT=' . $request->redis_port . "\n\n" .
            'MAIL_DRIVER=' . $request->mail_driver . "\n" .
            'MAIL_HOST=' . $request->mail_host . "\n" .
            'MAIL_PORT=' . $request->mail_port . "\n" .
            'MAIL_USERNAME=' . $request->mail_username . "\n" .
            'MAIL_PASSWORD=' . $request->mail_password . "\n" .
            'MAIL_ENCRYPTION=' . $request->mail_encryption . "\n\n" .
            'PUSHER_APP_ID=' . $request->pusher_app_id . "\n" .
            'PUSHER_APP_KEY=' . $request->pusher_app_key . "\n" .
            'PUSHER_APP_SECRET=' . $request->pusher_app_secret .
            "\n
            AWS_ACCESS_KEY_ID=\n
            AWS_SECRET_ACCESS_KEY=\n
            AWS_DEFAULT_REGION=us-east-1\n
            AWS_BUCKET=\n
            AWS_USE_PATH_STYLE_ENDPOINT=false\n
            \n
            PUSHER_HOST=\n
            PUSHER_PORT=443\n
            PUSHER_SCHEME=https\n
            PUSHER_APP_CLUSTER=mt1\n
            \n
            VITE_PUSHER_APP_KEY='\${PUSHER_APP_KEY}'\n
            VITE_PUSHER_HOST='\${PUSHER_HOST}'\n
            VITE_PUSHER_PORT='\${PUSHER_PORT}'\n
            VITE_PUSHER_SCHEME='\${PUSHER_SCHEME}'\n
            VITE_PUSHER_APP_CLUSTER='\${PUSHER_APP_CLUSTER}'\n
            \n
            RECAPTCHA_SITE_KEY=6LfS04QiAAAAAL_Ncl93KrMZi86kg8mlWjanxvPJ\n
            RECAPTCHA_SECRET_KEY=6LfS04QiAAAAAC8x57iXBFUOp3qayV2337pntLCK\n
            \n
            WEBSITE_TYPE='digital_board'\n
            \n
            #bool value only\n
            TRAINER_STATUS_BANK_DETAIL_FORM=true\n
            TRAINER_STATUS_EXPERIENCE_FORM=true\n
            TRAINER_STATUS_QUALIFICATION_FORM=true\n
            TRAINER_STATUS_EXPERIENCE_AS_TRAINEE_FORM=true\n
            TRAINER_STATUS_EXPERIENCE_AS_TRAINER_FORM=true\n
            TRAINER_STATUS_OTHER_DOCUMENT_FORM=true\n
            TRAINER_COMPACT_FORM=true\n
            \n
            #'extended' and 'compact' value only\n
            TRAINER_BANK_DETAIL_FORM_TYPE='extended'\n
            TRAINER_EXPERIENCE_FORM_TYPE='extended'\n
            TRAINER_QUALIFICATION_FORM_TYPE='extended'\n
            TRAINER_EXPERIENCE_AS_TRAINEE_FORM_TYPE='extended'\n
            TRAINER_EXPERIENCE_AS_TRAINER_FORM_TYPE='extended'\n
            \n
            SMS_API_KEY='261D841F89F835'\n
            SMS_SENDER_ID='SMSBit'\n
            \n
            PAGINATION_COUNT='3'\n
            \n
            APP_VERSION='Delta 1.0.8'\n
            APP_IS_DEMO=true";

        try {
            file_put_contents($this->envPath, $envFileData);
        } catch (Exception $e) {
            $results = trans('installer_messages.environment.errors');
        }

        return $results;
    }
}
