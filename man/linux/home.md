### linux man

   - 网址 ： http://man.linuxde.net/

### linux代理工具:

    - sudo apt-get install python-pip
    - pip install shadowsocks
    - 如果要转http代理 sudo apt-get install polipo


### ss 服务搭建过程

    - sudo apt-get update
    - sudo apt-get install python-pip
    - pip install shadowsocks
    - vim ssserver_config.json

     - `ssserver_config.json` 文件内容如下
    ```
    {
        "server": "0.0.0.0",
        "server_port": 443,
        "password": "ABC4957259vpn@",
        "timeout": 300,
        "method": "aes-256-cfb"
    }
    ```

    - ssserver -c ssserver_config.json -d start




