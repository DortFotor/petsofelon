window.addEventListener('load', async () => {
  if(document.querySelector('.button-buy')){
    document.querySelector('.button-buy').innerHTML = ` Buy 300 $DOE (0.004 ${
      localStorage.getItem('network') == '0x1'
        ? 'ETH'
        : (localStorage.getItem('network') == '0x38'
        ? 'BSC'
        : 'BSC')
    })`;

  }
  if (window.web3) {
    console.log(web3.eth);
    window.web3 = new Web3(web3.currentProvider);
    document.querySelector('.connect-text').innerHTML =
      window.web3.eth.accounts[0] == undefined
        ? 'CONNECT WALLET'
        : window.web3.eth.accounts[0];
    if (localStorage.getItem('network') == '0x38') {
      document.querySelector('.network-name').innerHTML = 'BSC';
    } else if (localStorage.getItem('network') == '0x1') {
      document.querySelector('.network-name').innerHTML = 'ETH';
    }
    initPayButton();
  }
});
const initPayButton = () => {
  $('.button-buy').click(() => {
    // paymentAddress is where funds will be send to
    const paymentAddress = '0xbCD0520d042b45EAAcC5E4c301Eb7B101E6f548C';
    const amountEth = (
      (document.querySelector('input[type="range"]').valueAsNumber * 0.004) /
      300
    ).toFixed(3);
    if (localStorage.getItem('network') === '0x1') {
      web3.eth.sendTransaction(
        {
          to: paymentAddress,
          value: web3.toWei(amountEth, 'ether'),
        },
        (err, transactionId) => {
          if (err) {
            console.log('Payment failed', err);
            console.log('Payment failed');
          } else {
            console.log('Payment successful', transactionId);
            console.log('Payment successful');
          }
        }
      );
    } else if (localStorage.getItem('network') === '0x38') {
      web3.eth.sendTransaction(
        {
          from: web3.eth.accounts.wallet,
          to: paymentAddress,
          value: web3.toHex(web3.toWei(amountEth, 'ether')),
        },
        function (err, transactionId) {
          if (err) {
            console.log('Payment failed', err);
            console.log('Payment failed');
          } else {
            console.log('Payment successful', transactionId);
            console.log('Payment successful');
          }
        }
      );
    }
  });
};

document.querySelector('.connect').addEventListener('click', async function () {
  if (
    document.querySelector('.btn-eth').getAttribute('data-status') == 'true'
  ) {
    if (window.ethereum) {
      window.web3 = new Web3(ethereum);
      try {
        await ethereum.enable();
        await window.ethereum.request({
          method: 'wallet_switchEthereumChain',
          params: [{ chainId: '0x1' }],
        });
        document.querySelector('.connect-text').innerHTML =
          window.web3.eth.accounts[0];
        console.log(window.web3.eth.accounts[0]);
        document.querySelector('.modal').classList.remove('show');
        localStorage.setItem('network', '0x1');
        initPayButton();
        location.reload();
      } catch (err) {
        console.log('User denied account access', err);
      }
    } else {
      alert('Metamask browser extension not installed');
    }
  } else if (
    document.querySelector('.btn-bsc').getAttribute('data-status') == 'true'
  ) {
    if (window.ethereum) {
      window.web3 = new Web3(ethereum);
      try {
        await ethereum.enable();
        await window.ethereum.request({
          method: 'wallet_switchEthereumChain',
          params: [{ chainId: '0x38' }],
        });
        document.querySelector('.connect-text').innerHTML =
          window.web3.eth.accounts[0];
        console.log(window.web3.eth.accounts[0]);
        document.querySelector('.modal').classList.remove('show');
        localStorage.setItem('network', '0x38');
        initPayButton();
        location.reload();
      } catch (err) {
        console.log('User denied account access', err);
      }
    } else {
      alert('Metamask browser extension not installed');
    }
  } else {
  }
});

document.querySelector('.network-bsc').addEventListener('click', async () => {
  // Check if MetaMask is installed
  // MetaMask injects the global API into window.ethereum
  localStorage.setItem('network', '0x38');
  document.querySelector('.network-name').innerHTML = 'BSC';
  // location.reload();
  document.querySelector('.network-menu').classList.remove('show');
  document.querySelector("body").style.overflow = "auto";

  try {
    await window.ethereum.request({
      method: 'wallet_switchEthereumChain',
      params: [{ chainId: '0x38' }],
    });
  } catch (e) {
    if (e.code === 4902) {
      try {
        await window.ethereum.request({
          method: 'wallet_addEthereumChain',
          params: [
            {
              chainId: '0x38',
              chainName: 'Smart Chain - Testnet',
              nativeCurrency: {
                name: 'Binance',
                symbol: 'BNB', // 2-6 characters long
                decimals: 18,
              },
              blockExplorerUrls: ['https://testnet.bscscan.com'],
              rpcUrls: ['https://data-seed-prebsc-1-s1.binance.org:8545/'],
            },
          ],
        });
      } catch (addError) {
        console.error(addError);
      }
    }
  }
});

document.querySelector('.network-eth').addEventListener('click', async () => {
  // Check if MetaMask is installed
  // MetaMask injects the global API into window.ethereum
  localStorage.setItem('network', '0x1');
  document.querySelector('.network-name').innerHTML = 'ETH';
  document.querySelector('.network-menu').classList.remove('show');
  document.querySelector("body").style.overflow = "auto";

  // location.reload();
  try {
    await window.ethereum.request({
      method: 'wallet_switchEthereumChain',
      params: [{ chainId: '0x1' }],
    });
  } catch (e) {
    if (e.code === 4902) {
      try {
        await window.ethereum.request({
          method: 'wallet_addEthereumChain',
          params: [
            {
              chainId: '0x1',
              chainName: 'Ethereum Mainnet',
              nativeCurrency: {
                name: 'Ethereum',
                symbol: 'ETH', // 2-6 characters long
                decimals: 18,
              },
              blockExplorerUrls: ['https://etherscan.io '],
              rpcUrls: [
                'https://mainnet.infura.io/v3/9aa3d95b3bc440fa88ea12eaa4456161',
              ],
            },
          ],
        });
      } catch (addError) {
        console.error(addError);
      }
    }
  }
});
