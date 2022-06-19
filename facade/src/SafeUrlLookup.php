<?php

namespace Piash\FacadePattern;


class SafeUrlLookup
{
    /**
     * google lookup api with api key
     *
     * @var string
     */
    private string $googleApiURL = '';

    private const API_KEY = 'YourAPIKEY';
    private const CLIENT_ID = 'your-client-id';
    private const CLIENT_VERSION = '1.5.2'; // right now, this is default version

    public function __construct(protected string $url)
    {
        $this->googleApiURL = "https://safebrowsing.googleapis.com/v4/threatMatches:find?key=" . self::API_KEY;
    }

    /**
     * lookup the URL in google safe and return result accordingly
     *
     * @return string
     */
    public function urlLookup(): string
    {
        $data = $this->getData();
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $this->googleApiURL);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json"));
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FAILONERROR, true);
        curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            return "Something is wrong with the site. Please try again";
        } else {
            return $this->response($response);
        }
    }

    /**
     * Get post body data for CURL
     *
     * @return string
     */
    private function getData(): string
    {
        return '{
                    "client": {
                      "clientId": "' . self::CLIENT_ID . '",
                      "clientVersion": "' . self::CLIENT_VERSION . '",
                    },
                    "threatInfo": {
                      "threatTypes":       ["MALWARE", "SOCIAL_ENGINEERING", "UNWANTED_SOFTWARE", "POTENTIALLY_HARMFUL_APPLICATION"],
                      "platformTypes":    ["ALL_PLATFORMS"],
                      "threatEntryTypes": ["URL"],
                      "threatEntries": [
                        {"url": "' . $this->url . '"}
                      ]
                    }
            }';
    }

    /**
     * format the response before return
     *
     * @return string
     */
    private function response($response): string
    {
        $response = json_decode($response);
        if (isset($response->matches)) {
            return match ($response->matches[0]->threatType) {
                "MALWARE" => "This site is a malware, not safe",
                "SOCIAL_ENGINEERING" => "This site is for social engineering, not safe",
                "UNWANTED_SOFTWARE" => "This site is a unwanted software, not safe",
                "POTENTIALLY_HARMFUL_APPLICATION" => "This site is a potentially harmful application, not safe",
                default => "This site is not safe",
            };
        }

        return "It is safe";
    }

}
