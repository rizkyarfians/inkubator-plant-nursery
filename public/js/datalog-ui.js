function capitalizeString(str) {
  let cap = str[0].toUpperCase();
  str = cap + str.slice(1);
  return str;
}
