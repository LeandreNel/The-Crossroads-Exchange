(function () {
  const STORAGE_KEY = "crossroadsGameState";
  const gamePages = ["witch", "blacksmith", "alchemist", "rogue"];
  const endPage = "end";
  const defaultVisitorAvatar =
    "data:image/svg+xml;charset=UTF-8,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%22120%22 height=%22120%22 viewBox=%220 0 120 120%22%3E%3Crect width=%22120%22 height=%22120%22 fill=%22%23E8E1FF%22/%3E%3Ctext x=%2260%22 y=%2268%22 text-anchor=%22middle%22 font-family=%22Poppins%22 font-size=%2216%22 fill=%22%23555%22%3EPHOTO%3C/text%3E%3C/svg%3E";

  const data = {
    items: [
      "Iron Ingot",
      "Obsidian Shard",
      "Lantern Oil",
      "Wolfbane Sprig",
      "Harvest Bread",
      "Moonstone",
      "Healing Poultice",
      "Blessed Candle",
      "Grave Dust",
      "Stolen Ring",
      "Cursed Coin",
    ],
    initialStock: {
      "Iron Ingot": 2,
      "Obsidian Shard": 0,
      "Lantern Oil": 1,
      "Wolfbane Sprig": 1,
      "Harvest Bread": 2,
      Moonstone: 0,
      "Healing Poultice": 0,
      "Blessed Candle": 0,
      "Grave Dust": 0,
      "Stolen Ring": 0,
      "Cursed Coin": 0,
    },
    visitors: [
      {
        name: "Old Bramblewick",
        role: "the hedge healer",
        avatar: "img/oldBramblewick.png",
        quote:
          "My granddaughter's fever won't break, and the herb woman two villages over wants coin I don't have. A sprig of wolfsbane, prepared right, is all a poultice like this one needs. I'll trade you one I've already made — it's done its work on worse.",
        request: "Wolfbane Sprig",
        offer: "Healing Poultice",
        acceptRep: 2,
        rejectRep: -1,
      },
      {
        name: "Tomas Ironhand",
        role: "the fair smith",
        avatar: "img/thomasIronhand.png",
        quote:
          "Give me the iron, and I'll shape you something with a real edge. Splitting kindling, mostly — maybe skinning game if the winter's bad. You have my word it won't leave these hills.",
        request: "Iron Ingot",
        offer: "Obsidian Shard",
        acceptRep: 1,
        rejectRep: -1,
      },
      {
        name: "Grix the Pawnbroker",
        role: "no questions asked",
        avatar: "img/grixThePawnbroker.png",
        quote:
          "Oil for iron. I don't ask what you're lighting, you don't ask where these ingots have been. Fair trade either way, far as I'm concerned.",
        request: "Lantern Oil",
        offer: "Iron Ingot",
        acceptRep: 0,
        rejectRep: 0,
      },
      {
        name: "Sister Marrow",
        role: "the plague-witch",
        avatar: "img/sisterMarrow.png",
        quote:
          "There's a man in the valley who wronged my sister and sleeps easy every night for it. Wolfsbane's sweet enough in a stew he'd never notice. Give it to me, and I'll give you dust that listens better than any prayer you've said.",
        request: "Wolfbane Sprig",
        offer: "Grave Dust",
        acceptRep: -2,
        rejectRep: 1,
      },
      {
        name: "Yenna the Wayfinder",
        role: "the traveling cartographer",
        avatar: "img/yennaTheWayfinder.png",
        quote:
          "Six families waiting past the ridge, empty bellies, no light to walk by after dark. Bread for a moonstone — it'll guide you same as it'll guide them, but they need it more tonight.",
        request: "Harvest Bread",
        offer: "Moonstone",
        acceptRep: 2,
        rejectRep: -1,
      },
      {
        name: "Brother Aldous",
        role: "the quiet monk",
        avatar: "img/brotherAldous.png",
        quote:
          "There's a woman two villages over who hasn't slept without pain in a year. If you're carrying a poultice, give it to me and I'll trade you a candle that's outlasted worse storms than the one you're walking into.",
        request: "Healing Poultice",
        offer: "Blessed Candle",
        acceptRep: 2,
        rejectRep: -1,
      },
      {
        name: "The Widow in Grey",
        role: "keeper of secrets",
        avatar: "img/theWidowInGrey.png",
        quote:
          "I know a man who'd pay well to learn where his brother's hiding. One letter, sealed with grave dust instead of wax, and he'll believe every word of it. Hand it over, and I'll give you a ring taken off a hand that won't be missing it.",
        request: "Grave Dust",
        offer: "Stolen Ring",
        acceptRep: -2,
        rejectRep: 1,
      },
      {
        name: "The Tithe Collector",
        role: "faceless and patient",
        avatar: "img/theTitheCollector.png",
        quote:
          "That ring isn't yours to keep — I know whose hand it came off, and I know where to find them. Hand it over, and what's left of that debt gets collected quietly. Everyone sleeps easier when these things get settled.",
        request: "Stolen Ring",
        offer: "Cursed Coin",
        acceptRep: 1,
        rejectRep: 0,
      },
    ],
    ending: [
      {
        min: 10,
        title: "Saintly",
        summary:
          "You traded with more hearts than pockets. Your judgement left the crossroads a kinder place.",
      },
      {
        min: 5,
        title: "Honest",
        summary:
          "You kept more promises than you broke. No songs written about you, but no curses either.",
      },
      {
        min: 1,
        title: "Pragmatic",
        summary:
          "You balanced mercy and survival. The crossroads remember you as practical and wary.",
      },
      {
        min: -4,
        title: "Questionable",
        summary:
          "You walked a thin line. Some left grateful, others left suspicious.",
      },
      {
        min: -999,
        title: "Sinister",
        summary:
          "You took more than you gave. The crossroads whisper your name with a shiver.",
      },
    ],
  };

  function readState() {
    try {
      const raw = window.sessionStorage.getItem(STORAGE_KEY);
      return raw ? JSON.parse(raw) : null;
    } catch (err) {
      return null;
    }
  }

  function writeState(state) {
    window.sessionStorage.setItem(STORAGE_KEY, JSON.stringify(state));
  }

  function createNewState(character) {
    const state = {
      character: character,
      currentVisitor: 0,
      reputation: 0,
      stock: Object.assign({}, data.initialStock),
      responses: [],
    };
    writeState(state);
    return state;
  }

  function getPageType() {
    return document.body.dataset.character || null;
  }

  function findElement(selector) {
    return document.querySelector(selector);
  }

  function findAll(selector) {
    return Array.from(document.querySelectorAll(selector));
  }

  function getGoodsImage(item) {
    const map = {
      "Iron Ingot": "img/ironIngot.png",
      "Obsidian Shard": "img/obsidianShard.png",
      "Lantern Oil": "img/lanternOil.png",
      "Wolfbane Sprig": "img/wolfbaneSprig.png",
      "Harvest Bread": "img/harvestBread.png",
      "Healing Poultice": "img/healingPoultrice.png",
      Moonstone: "img/moonStone.png",
      "Blessed Candle": "img/blessedCandle.png",
      "Grave Dust": "img/graveDust.png",
      "Stolen Ring": "img/stolenRing.png",
      "Cursed Coin": "img/cursedCoin.png",
    };
    return map[item] || defaultVisitorAvatar;
  }

  function renderGoodsCards(state) {
    const goodsRow = findElement(".goodsRow");
    if (!goodsRow) {
      return;
    }

    goodsRow.innerHTML = "";
    data.items.forEach((item) => {
      const card = document.createElement("div");
      card.className = "goodsCard";

      const title = document.createElement("div");
      title.className = "goodsCardTitle";
      title.textContent = item;

      const count = document.createElement("div");
      count.className = "goodsCardCount";
      count.textContent = state.stock[item] || 0;

      const imageWrapper = document.createElement("div");
      imageWrapper.className = "goodsCardImageWrapper";
      const image = document.createElement("img");
      image.className = "goodsImage";
      image.src = getGoodsImage(item);
      image.alt = `${item} image`;
      imageWrapper.appendChild(image);

      card.appendChild(title);
      card.appendChild(count);
      card.appendChild(imageWrapper);
      goodsRow.appendChild(card);
    });
  }

  function updateVisitorInfo(state) {
    const visitor = data.visitors[state.currentVisitor];
    if (!visitor) {
      return;
    }

    const counter = findElement(".visitorCounter");
    if (counter) {
      counter.textContent = `Visitors ${state.currentVisitor + 1} Of ${data.visitors.length}`;
    }

    const avatar = findElement(".visitorAvatarImage");
    const name = findElement(".visitorName");
    const role = findElement(".visitorRole");
    const quote = findElement(".quoteText");
    const stock = findElement(".visitorStock");
    const tradeItems = findAll(".visitorTradeRow .tradeItem");

    if (avatar) {
      avatar.src = visitor.avatar || defaultVisitorAvatar;
      avatar.alt = `${visitor.name} avatar`;
    }
    if (name) name.textContent = visitor.name;
    if (role) role.textContent = visitor.role;
    if (quote) quote.textContent = visitor.quote;
    if (stock)
      stock.textContent = `You have ${state.stock[visitor.request] || 0} ${visitor.request}`;
    if (tradeItems[0]) tradeItems[0].textContent = `1 ${visitor.request}`;
    if (tradeItems[1]) tradeItems[1].textContent = `1 ${visitor.offer}`;

    const primaryButton = findElement(".primaryAction");
    if (primaryButton) {
      primaryButton.disabled = state.stock[visitor.request] <= 0;
      primaryButton.textContent =
        state.stock[visitor.request] <= 0
          ? "Not enough to trade"
          : "Make the trade";
    }

    const message = findElement(".gameMessage");
    if (message) {
      message.textContent = "";
    }

    updateGoodsPanel(state);
    updateReputation(state);
  }

  function updateGoodsPanel(state) {
    const cards = findAll(".goodsCard");
    cards.forEach((card) => {
      const title = card.querySelector(".goodsCardTitle");
      const count = card.querySelector(".goodsCardCount");
      if (!title || !count) {
        return;
      }
      const item = title.textContent.trim();
      if (item in state.stock) {
        count.textContent = state.stock[item];
      }
    });
  }

  function updateReputation(state) {
    const rep = findElement(".reputationCounter");
    if (rep) {
      rep.textContent = `Reputation(+${state.reputation})`;
    }
  }

  function addResponse(state, visitor, accepted) {
    const repChange = accepted ? visitor.acceptRep : visitor.rejectRep;
    state.reputation += repChange;
    state.responses.push({
      name: visitor.name,
      accepted: accepted,
      repChange: repChange,
      request: visitor.request,
      offer: visitor.offer,
      stockBefore: Object.assign({}, state.stock),
    });
  }

  function nextVisitor(state) {
    state.currentVisitor += 1;
    writeState(state);
    if (state.currentVisitor >= data.visitors.length) {
      window.location.href = "endScreen.php";
      return;
    }
    updateVisitorInfo(state);
  }

  function handleTrade(state, accepted) {
    const visitor = data.visitors[state.currentVisitor];
    if (!visitor) {
      return;
    }

    if (accepted) {
      if (!state.stock[visitor.request] || state.stock[visitor.request] <= 0) {
        const message = findElement(".gameMessage");
        if (message) {
          message.textContent = `You don\'t have enough ${visitor.request} to make this trade.`;
        } else {
          window.alert(
            `You don't have enough ${visitor.request} to make this trade.`,
          );
        }
        return;
      }
      state.stock[visitor.request] -= 1;
      state.stock[visitor.offer] = (state.stock[visitor.offer] || 0) + 1;
    }

    addResponse(state, visitor, accepted);
    nextVisitor(state);
  }

  function bindPageEvents(state) {
    const primaryButton = findElement(".primaryAction");
    const secondaryButton = findElement(".secondaryAction");

    if (primaryButton) {
      primaryButton.addEventListener("click", function () {
        handleTrade(state, true);
      });
    }
    if (secondaryButton) {
      secondaryButton.addEventListener("click", function () {
        handleTrade(state, false);
      });
    }
  }

  function createEndScreen(state) {
    const status = findElement(".endScreenStatus");
    const summary = findElement(".endScreenSummary");
    const results = findElement(".endScreenResults");

    const ending =
      data.ending.find((e) => state.reputation >= e.min) ||
      data.ending[data.ending.length - 1];
    if (status) {
      status.textContent = `${ending.title} (${state.reputation >= 0 ? "+" : ""}${state.reputation})`;
    }
    if (summary) {
      summary.textContent = ending.summary;
    }

    if (results) {
      results.innerHTML = "";
      state.responses.forEach((response) => {
        const row = document.createElement("div");
        row.className = "endScreenResultRow";
        const nameSpan = document.createElement("span");
        nameSpan.textContent = response.name;
        const badgeSpan = document.createElement("span");
        badgeSpan.className = `resultBadge ${response.accepted ? "accepted" : "declined"}`;
        const action = response.accepted ? "Accepted" : "Declined";
        const sign = response.repChange >= 0 ? "+" : "";
        badgeSpan.textContent = `${action} - rep${sign}${response.repChange}`;
        row.appendChild(nameSpan);
        row.appendChild(badgeSpan);
        results.appendChild(row);
      });
    }
  }

  function init() {
    const pageType = getPageType();
    if (!pageType) {
      return;
    }

    if (pageType === endPage) {
      const state = readState();
      if (!state) {
        return;
      }
      createEndScreen(state);
      return;
    }

    if (!gamePages.includes(pageType)) {
      return;
    }

    let state = readState();
    if (!state || state.character !== pageType) {
      state = createNewState(pageType);
    }
    renderGoodsCards(state);
    bindPageEvents(state);
    updateVisitorInfo(state);
  }

  document.addEventListener("DOMContentLoaded", init);
})();
