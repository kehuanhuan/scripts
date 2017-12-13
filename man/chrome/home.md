### 安装chrome

    - wget -q -O - https://dl-ssl.google.com/linux/linux_signing_key.pub | sudo apt-key add -
    - sudo sh -c 'echo "deb [arch=amd64] http://dl.google.com/linux/chrome/deb/ stable main" >> /etc/apt/sources.list.d/google-chrome.list'
    - sudo apt-get update
    - sudo apt-get install google-chrome-stable

### google 常用工具：

   - 代理工具：Proxy SwitchyOmega
   - 屏蔽广告工具：Adblock Plus
   - 查看服务使用的工具：wappalyzer