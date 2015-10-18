<div class="block-select">
  <h3>Подбор ИБП</h3>
  <form action="">
    <table>
      <tr>
        <td>
          <label for="manufac">Производитель</label>
          <select name="manufac" id="manufac">
            <option>Все производители</option>
            <option>Все производители</option>
            <option>Все производители</option>
          </select>
        </td>
        <td>
          <span>Мощность ИБП (ВА):</span>
          <label for="power-from">
            от <input type="text" id="power-from">
          </label>
          <label for="power-for">
            до <input type="text" id="power-for">
          </label>
        </td>
      </tr>
      <tr>
        <td>
          <label for="workingtime">Время работы при 100% нагрузке от АКБ, мин.:</label>
          <input type="text" id="workingtime">
        </td>
        <td>
          <label for="input-power">Входное напряжение (В):</label>
          <select name="input-power" id="">
            <option>Пример выпадающего в dd input</option>
            <option>Пример выпадающего в dd input</option>
            <option>Пример выпадающего в dd input</option>
          </select>
        </td>
      </tr>
    </table>
    <button type="submit" value="submit" class="btn-red">Подобрать продукцию</button>
    <button type="reset" value="reset" class="btn-gray">Очистить форму</button>
  </form>
</div><!-- /.block-select -->
