<?php

namespace tao;

class BullshitGenerator
{
    /**
     * @param string $title 标题
     * @param int $length 文章长度
     * @param string $data 骚话位置
     * @return string|string[]
     */
    public function generator($title = '你好骚啊', $length = 1000, $data = 'data.json')
    {
        $body = "";
        $data = __DIR__ . DIRECTORY_SEPARATOR . $data;

        $data = json_decode(file_get_contents($data), true);

        while (strlen($body) / 3 < $length) {

            $num = rand(0, 100);
            if ($num < 10) {
                $body .= "\r\n";
            } elseif ($num < 20) {
                $body .= $data["famous"][array_rand($data["famous"], 1)];
                $replace = [$data["before"][array_rand($data["before"], 1)], $data['after'][array_rand($data['after'], 1)]];
                $find = ['a', 'b'];
                $body = str_replace($find, $replace, $body);
            } else {
                $body .= $data["bosh"][array_rand($data["bosh"], 1)];
            }
            $body = str_replace("x", $title, $body);
        }
        return $body;
    }
}


 